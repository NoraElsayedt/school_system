<?php

namespace App\Http\Controllers\Classroom;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;

class ClassroomController extends Controller
{

    public function index()
    {

        $grade = Grade::all();
        $classroom = Classroom::all();
        return view('Classroom.index', compact('grade', 'classroom'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $name = $request->Name;

        $name_en = $request->Name_class_en;



        if (!$name || !$name_en) {
            toastr()->error(trans('Grade.required'));
            return redirect()->back();
        }

        // if (Classroom::where('name_class->ar', $request->Name)->Orwhere('name_class->en', $request->Name_class_en)->exists()) {
        //     toastr()->error(trans('Classroom.exists'));

        //     return redirect()->back();
        // }

        try {

            $class = new Classroom();

            $class->name_class = [
                'en' => $request->Name_class_en,
                'ar' => $request->Name
            ];
            $class->grade_id = $request->Grade_id;

            $class->save();


            toastr()->success(trans('messages.success'));

            return redirect()->route('Classroom.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Classroom $classroom)
    {
        //
    }

    public function edit(Classroom $classroom)
    {
        //
    }

    public function update(Request $request, $id)
    {

        $name = $request->Name;

        $name_en = $request->Name_class_en;



        if (!$name || !$name_en) {
            toastr()->error(trans('Grade.required'));
            return redirect()->back();
        }

        // if (Classroom::where('name_class->ar', $request->Name)->Orwhere('name_class->en', $request->Name_class_en)->Andwhere('grade_id',$request->Grade_id)->exists()) {
        //     toastr()->error(trans('Classroom.exists'));

        //     return redirect()->back();
        // }

        try {


            $class_id = Classroom::findOrFail($id);

            $class_id->update([

                $class_id->name_class = ['en' => $request->Name_en, 'ar' => $request->Name],

                $class_id->grade_id = $request->Grade_id
            ]);

            toastr()->success(trans('messages.Update'));

            return redirect()->route('Classroom.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));

        return redirect()->route('Classroom.index');
    }
    public function deleteall(Request $request)
    {


        $deleteAllIdString = explode(',', $request->delete_all_id); //array
        // dd($deleteAllIdString);

        Classroom::whereIn('id',$deleteAllIdString)->delete(); //take array 

     
            toastr()->error(trans('messages.Delete'));

            return redirect()->route('Classroom.index');
        // }
    }
}
