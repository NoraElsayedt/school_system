<?php

namespace App\Repository\Online_Classe;

use Carbon\Carbon;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subjects;
use App\Models\Fund_Account;
use App\Models\Online_Classe;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;
use MacsiDigital\Zoom\Facades\Zoom;

use SebastianBergmann\Type\Exception;
use App\Repository\Online_Classe\Online_ClasseRepositoryInterface;

class Online_ClasseRepository implements Online_ClasseRepositoryInterface
{
  
    public function index()
    {

        $online_classes =  Online_Classe::all();
        return view('Online_Classe.index', compact('online_classes'));
    }

    public function create()
    {
        $my_classes = Grade::all();

        return view('Online_Classe.create', compact('my_classes'));
    }


    public function edit($id)
    {
        // $Online_Classe = Online_Classe::findOrFail($id);

        // $quizzes = Quizze::all();

        // return view('Online_Classe.edit', compact('Online_Classe','quizzes'));

    }
    public function store($request)
    {

       

        DB::beginTransaction();
        try {
          
            Online_Classe::create([
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {

        // DB::beginTransaction();

        // try {

        //     Online_Classe::findOrFail($request->id)->update([
        //         'title'=>$request->title,
        //         'answers'=>$request->answers,
        //         'right_answer'=>$request->right_answer,
        //         'quizze_id'=>$request->quizze_id,
        //         'score'=>$request->score
        //        ]);


        //     DB::commit();
        //     toastr()->success(trans('messages.Update'));
        //     return redirect()->route('Online_Classe.index');
        // } catch (Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }
    public function destroy($request)
    {
        
        Online_Classe::destroy($request->id);

        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Online_Classe.index');
    }
}
