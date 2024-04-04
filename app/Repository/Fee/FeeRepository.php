<?php

namespace App\Repository\Fee;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Fee;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;

class FeeRepository implements FeeRepositoryInterface
{
    public function index(){
        $fees  = Fee::all();
        return view('Fee.index', compact('fees'));
    }
    public function create(){
        $Grades = Grade::all();
        return view('Fee.add', compact('Grades'));

    }
    public function store($request){
        $fee = new Fee();
        $fee->title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar
          ];
          $fee->amount =$request->amount;
          $fee->grade_id =$request->Grade_id;
          $fee->classroom_id= $request->Classroom_id;
          $fee->description = $request->description;
          $fee->year = $request->year;
          $fee->save();
          toastr()->success(trans('messages.success'));
          return redirect()->route('Fee.index');
    }
    public function edit($id){
    return Fee::findOrFail($id);
    }
    public function GetGrades()
    {
      return Grade::all();
    }
    public function update($request){
        $fee =  Fee::findOrFail($request->id);
        $fee->title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar
          ];
          $fee->amount =$request->amount;
          $fee->grade_id =$request->Grade_id;
          $fee->classroom_id= $request->Classroom_id;
          $fee->description = $request->description;
          $fee->year = $request->year;
          $fee->save();
          toastr()->success(trans('messages.Update'));
          return redirect()->route('Fee.index');
    }
    public function destroy($request){
        Fee::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Fee.index');
    }    
  
}
