<?php

namespace App\Repository\Graduated;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;

class GraduatedRepository implements GraduatedRepositoryInterface
{
    public function GetGrades()
    {
        return Grade::all();
    }
    public function getAll()
    {
        return Student::withTrashed()->get();
    }
    public function studentGraduated($request)
    {
        DB::beginTransaction();

        try {
            $students = Student::where('grade_id', $request->Grade_id)->where(
                'classroom_id',
                $request->Classroom_id
            )->where('section_id', $request->section_id)->get();

            if ($students->count() < 1) {
                return redirect()->back()->with(['error_promotions' => 'لا توجد طلاب']);
            }
            foreach ($students as $student) {
                $ids = explode(',', $student->id);
                Student::whereIn('id', $ids)->delete();
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Graduated.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
