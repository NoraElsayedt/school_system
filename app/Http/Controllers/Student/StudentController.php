<?php

namespace App\Http\Controllers\Student;

use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StusentRequest;
use App\Repository\Student\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }
    public function index()
    {
        return $this->Student->getAllStudents();
    }

    public function create()
    {
        $Genders = $this->Student->getGenders();
        $nationals = $this->Student->getNationalitie();
        $bloods  = $this->Student->getbloods();
        $my_classes = $this->Student->getmy_classes();
        $parents = $this->Student->getParent();

        return view('Student.add', compact('Genders', 'nationals', 'bloods', 'my_classes', 'parents'));
    }

    
    public function store(StusentRequest $request)
    {
       return $this->Student->insertStudent($request);
    }

    public function show( $id)
    {
        $Genders = $this->Student->getGenders();
        $nationals = $this->Student->getNationalitie();
        $bloods  = $this->Student->getbloods();
        $my_classes = $this->Student->getmy_classes();
        $parents = $this->Student->getParent();
        $Student_id = $this->Student->showStudent($id);
        return view('Student.update', compact('Student_id','Genders', 'nationals', 'bloods', 'my_classes', 'parents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

   
    public function update(Request $request)
    {
        return $this->Student->updatestudent($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Student->deletestudent($request);
    }
    public function getClassrooms($gradeId)
    {
        return $this->Student->getClassroombyAjex($gradeId);
    }

    public function getSectionsByClassroom($classroomId)
    {
        return $this->Student->getSectionByAjex($classroomId);
    }
}
