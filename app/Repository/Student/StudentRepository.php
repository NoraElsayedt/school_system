<?php

namespace App\Repository\Student;

use App\Models\Blood;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Myparent;
use App\Models\Classroom;
use App\Models\Nationalitie;
use function Ramsey\Uuid\v1;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use SebastianBergmann\Type\Exception;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface
{
  public function getGenders()
  {
    return Gender::all();
  }

  public function GetGrades()
  {
    return Grade::all();
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
    DB::beginTransaction();

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


      if ($request->hasFile('photos')) {
        $photos = $request->file('photos');
        foreach ($photos as $photo) {
          $namephoto = $photo->getClientOriginalName();
          $photo->storeAs($Student->name, $namephoto, 'studentimage');
          $image_student = new Image();
          $image_student->filename = $namephoto;
          $image_student->imageable_type = 'app/Models/Student';
          $image_student->imageable_id = $Student->id;
          $image_student->save();
        }
      }
      DB::commit();
      toastr()->success(trans('messages.success'));
      return redirect()->route('Student.create');
    } catch (Exception $e) {
      DB::rollback();
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

  public function deletestudent($request)
  {
    Student::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));

    return redirect()->route('Student.index');
  }

  public function showAttacment($id)
  {

    return  Student::findOrFail($id);
  }

  public function uploadImage($request)
  {
    if ($request->hasFile('photos')) {
      $photos = $request->file('photos');
      foreach ($photos as $photo) {
        $namephoto = $photo->getClientOriginalName();
        $photo->storeAs($request->student_name, $namephoto, 'studentimage');
        $image_student = new Image();
        $image_student->filename = $namephoto;
        $image_student->imageable_type = 'app/Models/Student';
        $image_student->imageable_id = $request->student_id;
        $image_student->save();
      }
    }
    toastr()->success(trans('messages.success'));
    return redirect()->back();
  }

  public function downloadImage($name, $filename)
  {
    return Storage::download('student_attachment/' . $name . '/' . $filename);
  }

  public function deleteImage($request)
  {
    Storage::delete('student_attachment/' . $request->student_name . '/' . $request->filename);
    Image::destroy($request->id);
    toastr()->error(trans('messages.Delete'));
    return redirect()->back();
  }
}
