<?php

namespace App\Repository\Promotion;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;

class PromotionRepository implements PromotionRepositoryInterface
{
  public function index()
  {
    $Grades = Grade::all();
    return view('Promotion.index', compact('Grades'));
  }

  public function store($request)
  {
    DB::beginTransaction();

    try {
      $students = Student::where('grade_id', $request->Grade_id)->where(
        'classroom_id',
        $request->Classroom_id
      )->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();

      if ($students->count() < 1) {
        return redirect()->back()->with(['error_promotions' => 'لا توجد طلاب']);
      }
      foreach ($students as $student) {
        $ids = explode(',', $student->id);
        Student::whereIn('id', $ids)->update([
          'grade_id' => $request->Grade_id_new,
          'classroom_id' => $request->Classroom_id_new,
          'section_id' => $request->section_id_new,
          'academic_year' => $request->academic_year_new
        ]);



        Promotion::updateOrCreate([
          'student_id' => $student->id,
          'from_grade' => $request->Grade_id,
          'from_Classroom' => $request->Classroom_id,
          'from_section' => $request->section_id,
          'to_grade' => $request->Grade_id_new,
          'to_Classroom' => $request->Classroom_id_new,
          'to_section' => $request->section_id_new,
          'academic_year' => $request->academic_year,
          'academic_year_new' => $request->academic_year_new
        ]);
      }
      DB::commit();
      toastr()->success(trans('messages.success'));
      return redirect()->route('Promotion.index');
    } catch (Exception $e) {
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  public function getPromotion()
  {
    $promotions  = Promotion::all();
    return view('Promotion.management', compact('promotions'));
  }
  public function deleteAll($request)
  {
    DB::beginTransaction();

    try {
// delete by id 
      if ($request->page_id != 1) {
     
      } 
      
      
      // delete all 
      else {
        $promotions =  Promotion::all();
        foreach ($promotions as $promotion) {
          $ids = explode(',', $promotion->student_id);
          Student::whereIn('id', $ids)->update([
            'grade_id' => $promotion->from_grade,
            'classroom_id' => $promotion->from_Classroom,
            'section_id' => $promotion->from_section,
            'academic_year' => $promotion->academic_year
          ]);
      
        Promotion::truncate();
      


        }
      // DB::commit();
      toastr()->error(trans('messages.Delete'));
      return redirect()->back();
      }
    } 
    catch (Exception $e) {
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
}
