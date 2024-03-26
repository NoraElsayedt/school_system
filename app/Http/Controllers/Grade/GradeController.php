<?php

namespace App\Http\Controllers\Grade;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;
use App\Http\Controllers\Controller;
use App\Models\Classroom;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grade = Grade::all();
        return view('Grade.index', compact('grade'));
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
        $name = $request->Name;

        $name_en = $request->Name_en;



        if (!$name || !$name_en) {
            toastr()->error(trans('Grade.required'));
            return redirect()->back();
        }

        if (Grade::where('name->ar', $request->Name)->Orwhere('name->en', $request->Name_en)->exists()) {
            toastr()->error(trans('Grade.exists'));

            return redirect()->back();
        }

        try {

            $grade = new Grade();

            $grade->name = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $grade->notes = $request->Notes;

            $grade->save();


            toastr()->success(trans('messages.success'));

            return redirect()->route('Grade.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeRequest $request, $id)
    {

        try {
            // dd($request->Name);
            $validated = $request->validated();
            $grade_id = Grade::findOrFail($id);

            $grade_id->update([

                $grade_id->name = ['en' => $request->Name_en, 'ar' => $request->Name],

                $grade_id->notes = $request->Notes
            ]);

            toastr()->success(trans('messages.Update'));

            return redirect()->route('Grade.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    { 
        $class_id = Classroom::where('grade_id',$request->id)->first();

       
        if(!$class_id){
            // dd( $class_id );

        Grade::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));

        return redirect()->route('Grade.index');
        }else{
            toastr()->error(trans('Grade.cant_delete'));

            return redirect()->route('Grade.index');
        }
    }
}
