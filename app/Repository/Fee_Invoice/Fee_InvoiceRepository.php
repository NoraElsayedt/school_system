<?php

namespace App\Repository\Fee_Invoice;

use App\Models\Fee;
use App\Models\Student;
use App\Repository\Fee_Invoice\Fee_InvoiceRepositoryInterface;

class Fee_InvoiceRepository implements Fee_InvoiceRepositoryInterface
{
    public function index(){

    }
    public function show($id){
      $student = Student::findOrFail($id);
      $fees = Fee::where('classroom_id',$student->classroom_id)->get();
      return view('Fee_Invoice.add',compact('student','fees'));
      
    }
    public function store($request){
        return $request;
    }

}
