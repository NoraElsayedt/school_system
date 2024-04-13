<?php

namespace App\Repository\Processings;

use App\Models\Processing;
use App\Models\Student;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Processings\ProcessingRepositoryInterface;

use function Ramsey\Uuid\v1;

class ProcessingRepository implements ProcessingRepositoryInterface
{
    public function index()
    {
        $ProcessingFees = Processing::all();
        return view('Processings.index',compact('ProcessingFees'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('Processings.add', compact('student'));
    }
    public function edit($id)
    {
        $ProcessingFee = Processing::findOrFail($id);
        return view('Processings.edit',compact('ProcessingFee'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $student = Student::findOrFail($request->student_id);
            $processing =  Processing::create([
                'date' => date('Y-m-d'),
                'amount' => $request->final_balance,
                'student_id' => $request->student_id,
                'description' => $request->description
            ]);

            Student_Account::create([
                'date' => date('Y-m-d'),
                'type' => 'ProcessingFee',
                'student_id' => $request->student_id,
                'grade_id' => $student->grade_id,
                'classroom_id' => $student->classroom_id,
                'debit' => 0.00,
                'processing_id' => $processing->id,
                'description' => $request->description,
                'credit' => $request->final_balance,
            ]);


            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Processing.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {
      
        DB::beginTransaction();

        try {

            $student = Student::findOrFail($request->student_id);
            $processing = Processing::findOrFail($request->id);
            
            $processing->update([
                'date' => date('Y-m-d'),
                'amount' => $request->Debit,
                'student_id' => $request->student_id,
                'description' => $request->description
            ]);

            Student_Account::where('processing_id',$request->id)->update([
                'date' => date('Y-m-d'),
                'type' => 'ProcessingFee',
                'student_id' => $request->student_id,
                'grade_id' => $student->grade_id,
                'classroom_id' => $student->classroom_id,
                'debit' => 0.00,
                'processing_id' => $processing->id,
                'description' => $request->description,
                'credit' => $request->Debit,
            ]);


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Processing.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Processing::destroy($request->id);

    toastr()->success(trans('messages.Delete'));
    return redirect()->route('Processing.index');
    }
}
