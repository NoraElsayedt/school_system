<?php

namespace App\Repository\Library;

use App\Models\Grade;
use App\Models\Library;
use App\Models\Student;
use App\Models\Fund_Account;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use Illuminate\Support\Facades\Storage;
use App\Repository\Library\LibraryRepositoryInterface;



class LibraryRepository implements LibraryRepositoryInterface
{

    public function index()
    {
        $books =  Library::all();
        return view('Library.index', compact('books'));
    }

    public function create()
    {
        $my_classes = Grade::all();
        return view('Library.create', compact('my_classes'));
    }

    public function downloadAttachment($id)
    {
        $book = Library::findOrFail($id);
        $filePath = storage_path('app/Library/' . $book->title . '/' . $book->file_name);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'File not found');
        }
    }
    public function edit($id)
    {
        $book = Library::findOrFail($id);
        $grades = Grade::all();
        return view('Library.edit', compact('book', 'grades'));
    }
    public function store($request)
    {

        DB::beginTransaction();

        try {


            $Library = new Library();



            $Library->title = $request->title;
            $Library->Grade_id = $request->Grade_id;
            $Library->Classroom_id = $request->Classroom_id;
            $Library->section_id = $request->section_id;
            $pdf = $request->file('file_name');

            $namebdf = $pdf->getClientOriginalName();

            $pdf->storeAs($Library->title, $namebdf, 'Library');
            $Library->file_name = $namebdf;
            $Library->teacher_id = '1';
            $Library->save();


            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Library.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {


        DB::beginTransaction();

        try {


            $Library = Library::findOrFail($request->id);
            Storage::disk('Library')->deleteDirectory( $Library->title);

            $Library->title = $request->title;
            $Library->Grade_id = $request->Grade_id;
            $Library->Classroom_id = $request->Classroom_id;
            $Library->section_id = $request->section_id;
           
            $pdf = $request->file('file_name');

            $namebdf = $pdf->getClientOriginalName();

            $pdf->storeAs($Library->title, $namebdf, 'Library');
            $Library->file_name = $namebdf;
            $Library->teacher_id = '1';
            $Library->save();


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Library.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        // delete attachment 

        $Library =  Library::findOrFail($request->id);
        // delete attachment book from disk by file 
        // Storage::disk('Library')->delete( $Library->title . '/' . $Library->file_name);
// delete by directory

        Storage::disk('Library')->deleteDirectory( $Library->title);
        $Library->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Library.index');
    }
}
