<?php

namespace App\Http\Controllers\Fee;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Fee\FeeRepositoryInterface;

class FeeController extends Controller
{
    protected $Fee;
    public function __construct(FeeRepositoryInterface $Fee)
    {
        $this->Fee = $Fee;
    }
    public function index()
    {
       return $this->Fee->index();
    }

    public function create()
    {
       return $this->Fee->create();
    }

   
    public function store(Request $request)
    {
       return $this->Fee->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
          $fee = $this->Fee->edit($id);
          $Grades = $this->Fee->GetGrades();

          return view('Fee.edit',compact('fee','Grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Fee->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       return $this->Fee->destroy($request);
    }
}
