<?php

namespace App\Repository\Payment;

use App\Models\Payment;
use App\Models\Student_Account;
use App\Models\Student;
use App\Models\Fund_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Payment\PaymentRepositoryInterface;



class PaymentRepository implements PaymentRepositoryInterface
{

    public function index()
    {
      $payment_students =  Payment::all();
      return view('Payment.index',compact('payment_students'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('Payment.add', compact('student'));
    }
    public function edit($id)
    {
        $payment_student = Payment::findOrFail($id);
        return view('Payment.edit', compact('payment_student'));
        
    }
    public function store($request)
    {
      
        DB::beginTransaction();

        try {

            $student = Student::findOrFail($request->student_id);
            $Payment =  Payment::create([
                'date' => date('Y-m-d'),
                'amount' => $request->Debit,
                'student_id' => $request->student_id,
                'description' => $request->description
            ]);
            Fund_Account::create([
                'date' => date('Y-m-d'),
                'debit' =>  0.00, 
                'payment_id' => $Payment->id,
                'description' => $request->description,
                'credit' =>$request->Debit
              ]);

            Student_Account::create([
                'date' => date('Y-m-d'),
                'type' => 'Payment',
                'student_id' => $request->student_id,
                'grade_id' => $student->grade_id,
                'classroom_id' => $student->classroom_id,
                'debit' =>  $request->Debit,
                'payment_id' => $Payment->id,
                'description' => $request->description,
                'credit' =>0.00,
            ]);


            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Payment.index');
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
            $Payment = Payment::findOrFail($request->id);

          $Payment->update([
                'date' => date('Y-m-d'),
                'amount' => $request->Debit,
                'student_id' => $request->student_id,
                'description' => $request->description
            ]);
            Fund_Account::where('payment_id', $request->id)->update([
                'date' => date('Y-m-d'),
                'debit' =>  0.00, 
                'payment_id' => $Payment->id,
                'description' => $request->description,
                'credit' =>$request->Debit
              ]);

            Student_Account::where('payment_id', $request->id)->update([
                'date' => date('Y-m-d'),
                'type' => 'Payment',
                'student_id' => $request->student_id,
                'grade_id' => $student->grade_id,
                'classroom_id' => $student->classroom_id,
                'debit' =>  $request->Debit,
                'payment_id' => $Payment->id,
                'description' => $request->description,
                'credit' =>0.00,
            ]);


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Payment.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Payment::destroy($request->id);

        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Payment.index');
    }
}
