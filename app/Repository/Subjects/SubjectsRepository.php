<?php

namespace App\Repository\Subjects;

use App\Models\Blood;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Myparent;
use App\Models\Subjects;
use App\Models\Classroom;
use App\Models\Nationalitie;
use function Ramsey\Uuid\v1;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Type\Exception;
use Illuminate\Support\Facades\Storage;

class SubjectsRepository implements SubjectsRepositoryInterface
{
    public function index()
    {
        $SubjectsFees = Subjects::all();
        return view('Subjects.index', compact('SubjectsFees'));
    }
    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('Subjects.create', compact('grades', 'teachers'));
    }
    public function show($id)
    {
        // $student = Student::findOrFail($id);
        // return view('Subjectss.add', compact('student'));
    }
    public function edit($id)
    {
        $subject = Subjects::findOrFail($id);
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('Subjects.edit', compact('subject', 'grades', 'teachers'));
    }

    public function store($request)
    {

        DB::beginTransaction();

        try {


            $Subjects = new Subjects();
            $Subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Subjects->grade_id = $request->Grade_id;
            $Subjects->classroom_id = $request->Classroom_id;
            $Subjects->teacher_id = $request->teacher_id;
            $Subjects->save();


            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Subjects.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {

        DB::beginTransaction();

        try {


            $Subjects = Subjects::findOrFail($request->id);

            $Subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Subjects->grade_id = $request->Grade_id;
            $Subjects->classroom_id = $request->Classroom_id;
            $Subjects->teacher_id = $request->teacher_id;
            $Subjects->save();



            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Subjects.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Subjects::destroy($request->id);

        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Subjects.index');
    }
}
