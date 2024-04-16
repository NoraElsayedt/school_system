<?php

namespace App\Repository\Attendance;

use Log;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Attendance;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Attendance\AttendanceRepositoryInterface;


class AttendanceRepository implements AttendanceRepositoryInterface
{
  public function index()
  {


    $Grades = Grade::with(['Section'])->get();
    $list_Grades = Grade::all();
    $Classroom = Classroom::all();
    $Teacher = Teacher::all();

    return view('Attendance.index', compact('Grades', 'list_Grades', 'Classroom', 'Teacher'));
  }
  public function show($id)
  {
    $students = Student::with(['Attendance'])->where('section_id', $id)->get();

    return view('Attendance.show', compact('students'));
  }
  public function store($request)
  {


    DB::beginTransaction();
    try {
      foreach ($request->attendences as $students_id => $Attendances) {

        if ($Attendances == '1') {

          $status = '1';
        } else {
          $status = '0';
        }


        Attendance::create([
          'attendance_date' => date('Y-m-d'),
          'status' => $status,
          'student_id' => $students_id,
          'grade_id' => $request->grade_id,
          'classroom_id' => $request->classroom_id,
          'section_id' => $request->section_id,
          // 'teacher_id' => '1'
        ]);
      }





      // Commit the transaction
      DB::commit();
      toastr()->success(trans('messages.success'));
      return redirect()->back();
    } catch (Exception $e) {
      DB::rollback();
      // Log the error message for debugging

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}
