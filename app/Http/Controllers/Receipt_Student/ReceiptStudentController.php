<?php

namespace App\Http\Controllers\Receipt_Student;

use Illuminate\Http\Request;
use App\Models\Receipt_Student;
use App\Http\Controllers\Controller;

use App\Repository\Receipt_Student\Receipt_StudentRepositoryInterface;


class ReceiptStudentController extends Controller
{
    public $Receipt_Student;

    public function __construct(Receipt_StudentRepositoryInterface $Receipt_Student)
    {
        $this->Receipt_Student = $Receipt_Student;
    }
    public function index()
    {
        return $this->Receipt_Student->index();
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
        return $this->Receipt_Student->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
      return $this->Receipt_Student->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        return $this->Receipt_Student->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Receipt_Student->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Receipt_Student->destroy($request);
    }
}
