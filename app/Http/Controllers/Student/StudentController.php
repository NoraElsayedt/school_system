<?php

namespace App\Http\Controllers\Student;

use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StusentRequest;
use App\Models\Image;
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
    public function show($id)
    {
        $Genders = $this->Student->getGenders();
        $nationals = $this->Student->getNationalitie();
        $bloods  = $this->Student->getbloods();
        $my_classes = $this->Student->getmy_classes();
        $parents = $this->Student->getParent();
        $Student_id = $this->Student->showStudent($id);
        return view('Student.update', compact('Student_id', 'Genders', 'nationals', 'bloods', 'my_classes', 'parents'));
    }
    public function edit($id)
    {
        $Student = $this->Student->showAttacment($id);
        $a = Image::where('imageable_id', $id)->get();
        return view('Student.edit', compact('Student', 'a'));
    }
    public function update(Request $request)
    {
        return $this->Student->updatestudent($request);
    }
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
    public function Upload_attachment(Request $request)
    {
        return $this->Student->uploadImage($request);
    }
    public function Download_attachment($name, $filename)
    {

        return $this->Student->downloadImage($name, $filename);
    }
    public function deleteImage(Request $request)
    {
        return $this->Student->deleteImage($request);
    }
}
