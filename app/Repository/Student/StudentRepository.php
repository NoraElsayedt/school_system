<?php

namespace App\Repository\Student;

use App\Models\Blood;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Myparent;
use App\Models\Classroom;
use App\Models\Nationalitie;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Type\Exception;

class StudentRepository implements StudentRepositoryInterface
{
  public function getGenders()
  {
    return Gender::all();
  }
  public function getNationalitie()
  {
    return Nationalitie::all();
  }
  public function getbloods()
  {
    return Blood::all();
  }
  public function getmy_classes()
  {
    return Grade::all();
  }
  public function getParent()
  {
    return  Myparent::all();
  }
  public function getClassroombyAjex($grade_id)
  {
    $classrooms = Classroom::where('grade_id', $grade_id)->pluck('name_class', 'id');
    return $classrooms;
  }

  public function getSectionByAjex($classroomId)
  {
    $sections = Section::where('classroom_id', $classroomId)->pluck('name_section', 'id');
    return $sections;
  }

  public function insertStudent($request)
  {
    $name = $request->name_ar;

    $name_en = $request->name_en;



    if (!$name || !$name_en) {
      toastr()->error(trans('Grade.required'));
      return redirect()->back();
    }


    try {

      $Student = new Student();

      $Student->name = [
        'en' => $request->name_en,
        'ar' => $request->name_ar
      ];
      $Student->gender_id = $request->gender_id;
      $Student->email = $request->email;
      $Student->password = Hash::make($request->password);
      $Student->nationalitie_id = $request->nationalitie_id;
      $Student->blood_id = $request->blood_id;
      $Student->Date_of_Birth = $request->Date_Birth;
      $Student->grade_id = $request->Grade_id;
      $Student->classroom_id = $request->Classroom_id;
      $Student->section_id = $request->section_id;
      $Student->myparent_id = $request->parent_id;
      $Student->academic_year = $request->academic_year;

      $Student->save();


      toastr()->success(trans('messages.success'));

      return redirect()->route('Student.create');
    } catch (Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  public function getAllStudents()
  {
    $Students = Student::all();
    return view('Student.index', compact('Students'));
  }

  public function showStudent($id)
  {
    return Student::findOrFail($id);
  }


  public function updatestudent($request)
  {


    $name = $request->name_ar;

    $name_en = $request->name_en;



    if (!$name || !$name_en) {
      toastr()->error(trans('Grade.required'));
      return redirect()->back();
    }


    try {

      $Student = Student::findOrFail($request->id);

      $Student->name = [
        'en' => $request->name_en,
        'ar' => $request->name_ar
      ];
      $Student->gender_id = $request->gender_id;
      $Student->email = $request->email;
      $Student->password = Hash::make($request->password);
      $Student->nationalitie_id = $request->nationalitie_id;
      $Student->blood_id = $request->blood_id;
      $Student->Date_of_Birth = $request->Date_Birth;
      $Student->grade_id = $request->Grade_id;
      $Student->classroom_id = $request->Classroom_id;
      $Student->section_id = $request->section_id;
      $Student->myparent_id = $request->parent_id;
      $Student->academic_year = $request->academic_year;

      $Student->save();


      toastr()->success(trans('messages.Update'));

      return redirect()->route('Student.index');
    } catch (Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function deletestudent($request){
   Student::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));

    return redirect()->route('Student.index');

  }

}
