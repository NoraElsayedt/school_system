<?php

namespace App\Repository\Quizze;

use App\Models\Quizze;
use App\Models\Student_Account;
use App\Models\Student;
use App\Models\Fund_Account;
use App\Models\Grade;
use App\Models\Subjects;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Quizze\QuizzeRepositoryInterface;
use Mockery\Matcher\Subset;

class QuizzeRepository implements QuizzeRepositoryInterface
{

    public function index()
    {

      $quizzes =  Quizze::all();
      return view('Quizze.index',compact('quizzes'));
    }

    public function create(){
        $subjects = Subjects::all();
        $teachers = Teacher::all();
        $my_classes = Grade::all();
        return view('Quizze.create',compact('subjects','teachers','my_classes'));
    }

   
    public function edit($id)
    {
        $quizz = Quizze::findOrFail($id);

        $subjects = Subjects::all();
        $teachers = Teacher::all();
        $my_classes = Grade::all();
        return view('Quizze.edit', compact('quizz','subjects','teachers','my_classes'));
        
    }
    public function store($request)
    {
  
        DB::beginTransaction();

        try {
            $Quizze = new Quizze();
            $Quizze->name = [
               'ar'=> $request->Name_ar,
              'en' => $request->Name_en
            ];
            $Quizze->subject_id =$request->subject_id ;
            $Quizze->teacher_id = $request->teacher_id ;
            $Quizze->grade_id  =$request->Grade_id ;
            $Quizze->classroom_id  = $request->Classroom_id ;
            $Quizze->section_id =$request->section_id ;
          
            $Quizze->save();

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Quizze.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {

        DB::beginTransaction();

        try {

          
            $Quizze = Quizze::findOrFail($request->id);

            $Quizze->name = [
                'ar'=> $request->Name_ar,
               'en' => $request->Name_en
             ];
             $Quizze->subject_id =$request->subject_id ;
             $Quizze->teacher_id = $request->teacher_id ;
             $Quizze->grade_id  =$request->Grade_id ;
             $Quizze->classroom_id  = $request->Classroom_id ;
             $Quizze->section_id =$request->section_id ;
           
             $Quizze->save();
 


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Quizze.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Quizze::destroy($request->id);

        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Quizze.index');
    }
}
