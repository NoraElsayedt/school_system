<?php

namespace App\Http\Controllers\Fee_Invoice;

use App\Models\Fee_Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Fee_Invoice\Fee_InvoiceRepositoryInterface;

class FeeInvoiceController extends Controller
{
    public $invoice ;

    public function __construct(Fee_InvoiceRepositoryInterface $invoice)
    {
     $this->invoice = $invoice;   
    }

    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->invoice->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->invoice->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee_Invoice $fee_Invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fee_Invoice $fee_Invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee_Invoice $fee_Invoice)
    {
        //
    }
}
