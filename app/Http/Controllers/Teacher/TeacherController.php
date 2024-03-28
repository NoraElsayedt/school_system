<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;
use App\Http\Controllers\Controller;
use App\Repository\Teacher\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    
    public function index()
    {
      
      $teacher = $this->Teacher->getAllTeachers();
      return view('Teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $specializations = $this->Teacher->getspecialization();
      $genders = $this->Teacher->getgender();
      return view('Teacher.create',compact('genders','specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
        return $this->Teacher->insertTeacher($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
      $Teachers=  $this->Teacher->editTeacher($id);
      $specializations = $this->Teacher->getspecialization();
      $genders = $this->Teacher->getgender();

      return view('Teacher.Edit',compact('Teachers','specializations' ,'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Teacher->updateTeacher($request);
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      return $this->Teacher->deleteTeacher($request);
    }
}
