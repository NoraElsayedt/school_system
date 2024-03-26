<?php

namespace App\Http\Controllers\Sections;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $Grades = Grade::with(['Section'])->get();
        $list_Grades = Grade::all();
        $Classroom = Classroom::all();
        $Teacher = Teacher::all();

        return view('Sections.index', compact('Grades', 'list_Grades', 'Classroom', 'Teacher'));
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



        $name = $request->Name_Section_Ar;

        $name_en = $request->Name_Section_En;



        if (!$name || !$name_en) {
            toastr()->error(trans('Grade.required'));
            return redirect()->back();
        }


        try {

            $Section = new Section();

            $Section->name_section = [
                'en' => $request->Name_Section_En,
                'ar' => $request->Name_Section_Ar
            ];
            $Section->grade_id = $request->Grade_id;
            $Section->classroom_id = $request->Class_id;
            $Section->status = 1;

            $Section->save();


            foreach ($request->Teacher_id as $t) {
                DB::table('section_teacher')->insert([

                    'teacher_id' => $t,

                    'section_id' => $Section->id

                ]);
            }

            toastr()->success(trans('messages.success'));

            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $name = $request->Name_Section_Ar;

            $name_en = $request->Name_Section_En;



            if (!$name || !$name_en) {
                toastr()->error(trans('Grade.required'));
                return redirect()->back();
            }

            try {


                $Section = Section::findOrFail($id);


                $Section->name_section = [
                    'en' => $request->Name_Section_En,
                    'ar' => $request->Name_Section_Ar
                ];
                $Section->grade_id = $request->Grade_id;
                $Section->classroom_id = $request->Class_id;
                if(isset($request->Status)){
                    $Section->status = 1 ;
                }
                else{


                $Section->status = 2;
            }

                $Section->save();

// update in pivot table
                if (isset($request->teacher_id)) {
                    $Section->Teacher()->sync($request->teacher_id);
                } else {
                    $Section->Teacher()->sync(array());
                }

                toastr()->success(trans('messages.Update'));

                return redirect()->route('Sections.index');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));

        return redirect()->route('Sections.index');
    }
    public function classes($id)
    {
        return Classroom::where("grade_id", $id)->pluck("name_class", "id");
    }
}
