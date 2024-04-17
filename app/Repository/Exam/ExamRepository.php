<?php

namespace App\Repository\Exam;

use App\Models\Exam;
use App\Models\Student_Account;
use App\Models\Student;
use App\Models\Fund_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Exam\ExamRepositoryInterface;



class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
      $exams =  Exam::all();
      return view('Exam.index',compact('exams'));
    }

    public function create(){
        return view('Exam.create');
    }

    public function show($id)
    {
      
    }
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('Exam.edit', compact('exam'));
        
    }
    public function store($request)
    {
    
        DB::beginTransaction();

        try {
            $Exam = new Exam();
            $Exam->name = [
               'ar'=> $request->Name_ar,
              'en' => $request->Name_en
            ];
            $Exam->term =$request->term ;
            $Exam->acadmic_year = $request->academic_year ;
            $Exam->save();

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exam.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {
 
        DB::beginTransaction();

        try {

          
            $Exam = Exam::findOrFail($request->id);

            $Exam->name = [
                'ar'=> $request->Name_ar,
               'en' => $request->Name_en
             ];
             $Exam->term =$request->term ;
             $Exam->acadmic_year = $request->academic_year ;
             $Exam->save();
 


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Exam.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Exam::destroy($request->id);

        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Exam.index');
    }
}
