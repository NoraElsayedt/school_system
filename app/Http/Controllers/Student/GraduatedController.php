<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Graduated\GraduatedRepositoryInterface;

class GraduatedController extends Controller
{
    protected $Graduated;
    public function __construct(GraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }
    public function index()
    {
       $Students = $this->Graduated->getAll() ;
       return view('Graduated.index',compact('Students'));
    }

    public function create()
    {
        $Grades = $this->Graduated->GetGrades();
        return view('Graduated.create',compact('Grades'));
    }

    public function store(Request $request)
    {
       return $this->Graduated->studentGraduated($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       return $this->Graduated->studentReturn($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
  return $this->Graduated->studentDelete($request);
    }
}
