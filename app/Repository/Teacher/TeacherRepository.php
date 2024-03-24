<?php

namespace App\Repository\Teacher;

use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Type\Exception;

class TeacherRepository implements TeacherRepositoryInterface
{

  public function getAllTeachers()
  {
    return Teacher::all();
  }
  public function getspecialization()
  {

    return Specialization::all();
  }
  public function getgender()
  {
    return Gender::all();
  }
  public function insertTeacher($request)
  {
    $name = $request->Name_ar;

    $name_en = $request->Name_en;



    if (!$name || !$name_en) {
      toastr()->error(trans('Grade.required'));
      return redirect()->back();
    }


    try {

      $Teacher = new Teacher();

      $Teacher->Name = [
        'en' => $request->Name_en,
        'ar' => $request->Name_ar
      ];
      $Teacher->Gender_id = $request->Gender_id;
      $Teacher->Email = $request->Email;
      $Teacher->Password = Hash::make($request->Password);
      $Teacher->Specialization_id = $request->Specialization_id;
      $Teacher->Joining_Date = $request->Joining_Date;
      $Teacher->Address = $request->Address;

      $Teacher->save();


      toastr()->success(trans('messages.success'));

      return redirect()->route('Teacher.index');
    } catch (Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function editTeacher($id){
    return Teacher::findOrFail($id);
  }

  public function updateTeacher($request)
  {
    $name = $request->Name_ar;

    $name_en = $request->Name_en;



    if (!$name || !$name_en) {
      toastr()->error(trans('Grade.required'));
      return redirect()->back();
    }


    try {

      $Teacher =  Teacher::findOrFail($request->id);

      $Teacher->Name = [
        'en' => $request->Name_en,
        'ar' => $request->Name_ar
      ];
      $Teacher->Gender_id = $request->Gender_id;
      $Teacher->Email = $request->Email;
      $Teacher->Password = Hash::make($request->Password);
      $Teacher->Specialization_id = $request->Specialization_id;
      $Teacher->Joining_Date = $request->Joining_Date;
      $Teacher->Address = $request->Address;

      $Teacher->save();


      toastr()->success(trans('messages.Update'));

      return redirect()->route('Teacher.index');
    } catch (Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function deleteTeacher($request){
    Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));

        return redirect()->route('Teacher.index');

  }


}
