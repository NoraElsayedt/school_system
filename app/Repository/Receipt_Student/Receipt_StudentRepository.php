<?php

namespace App\Repository\Receipt_Student;

use App\Models\Fund_Account;
use App\Models\Student;
use App\Models\Receipt_Student;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Receipt_Student\Receipt_StudentRepositoryInterface;

class Receipt_StudentRepository implements Receipt_StudentRepositoryInterface
{
    public function index()
    {
        
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('Receipt_Student.add',compact('student'));
    }

    public function edit($id)
    {}

    public function store($request)
    {
        DB::beginTransaction();

    try {

        $student = Student::findOrFail($request->student_id);

      
        $receipt_student =  Receipt_Student::create([
            'date' =>date('Y-m-d'),
            'debit'=> $request->Debit,
            'student_id'=>$request->student_id,
            'description'=>$request->description
          ]);
          Fund_Account::create([
            'date' =>date('Y-m-d'),
            'debit'=> $request->Debit,
            'receipt_student_id'=>$receipt_student->id,
            'description'=>$request->description,
            'credit'=>0.00
          ]);
          Student_Account::create([
            'date' =>date('Y-m-d'),
            'type' =>'receipt',
            'student_id'=>$request->student_id,

            'grade_id'=>$student->grade_id,

            'classroom_id'=>$student->classroom_id,
            
            'debit'=> $request->Debit,
            'receipt_student_id'=>$receipt_student->id,
            'description'=>$request->description,
            'credit'=>0.00
          ]);

 
      DB::commit();
      toastr()->success(trans('messages.success'));
      return redirect()->route('Receipt_Student.index');
    } catch (Exception $e) {
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function update($request)
    {}

    public function destroy($request)
    {}

}
