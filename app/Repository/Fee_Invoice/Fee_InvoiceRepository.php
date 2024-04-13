<?php

namespace App\Repository\Fee_Invoice;

use Log;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Fee_Invoice;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Fee_Invoice\Fee_InvoiceRepositoryInterface;


class Fee_InvoiceRepository implements Fee_InvoiceRepositoryInterface
{
  public function index()
  {
    $Fee_invoices = Fee_invoice::all();
    return view('Fee_Invoice.index', compact('Fee_invoices'));
  }
  public function show($id)
  {
    $student = Student::findOrFail($id);
    $fees = Fee::where('classroom_id', $student->classroom_id)->get();
    return view('Fee_Invoice.add', compact('student', 'fees'));
  }
  public function store($request)
  {


    DB::beginTransaction();
    try {


      $Fees = new Fee_invoice();
      $Fees->invoice_date = date('Y-m-d');
      $Fees->student_id = $request->student_id;
      $Fees->Grade_id = $request->Grade_id;
      $Fees->Classroom_id = $request->Classroom_id;
      $Fees->fee_id = $request->fee_id;
      $Fees->amount = $request->amount;
      $Fees->description = $request->description;
      $Fees->save();

      // Insert data into StudentAccount table
      $StudentAccount = new Student_Account();
      $StudentAccount->date = date('Y-m-d');
      $StudentAccount->type = 'invoice';
      $StudentAccount->fee_invoice_id = $Fees->id;

      $StudentAccount->student_id = $request->student_id;
      $StudentAccount->Grade_id = $request->Grade_id;
      $StudentAccount->Classroom_id = $request->Classroom_id;
      $StudentAccount->Debit = $request->amount;
      $StudentAccount->credit = 0.00;
      $StudentAccount->description = $request->description;
      $StudentAccount->save();



      // Commit the transaction
      DB::commit();
      toastr()->success(trans('messages.success'));
      return redirect()->route('Fee_Invoice.index');
    } catch (Exception $e) {
      DB::rollback();
      // Log the error message for debugging

      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  public function edit($id)
  {
    $fee_invoices = Fee_Invoice::findOrFail($id);
    $fees = Fee::all();

    return view('Fee_Invoice.edit', compact('fee_invoices', 'fees'));
  }
  public function update($request)
  {
    DB::beginTransaction();
    try {
      $fee_invoices = Fee_Invoice::findOrFail($request->id);

      $fee_invoices->update([
        'fee_id' => $request->fee_id,
        'amount' => $request->amount,
        'description' => $request->description,
      ]);
      $StudentAccount = Student_Account::where('fee_invoice_id', $request->id)->first();
      $StudentAccount->update([
        'debit' => $request->amount,
        'description' => $request->description
      ]);


      DB::commit();

      toastr()->success(trans('messages.Update'));
      return redirect()->route('Fee_Invoice.index');
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
  public function delete($request){
    Fee_Invoice::destroy($request->id);
    toastr()->success(trans('messages.Delete'));
    return redirect()->route('Fee_Invoice.index');
  }

}
