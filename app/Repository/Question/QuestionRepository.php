<?php

namespace App\Repository\Question;

use App\Models\Question;
use App\Models\Student_Account;
use App\Models\Student;
use App\Models\Fund_Account;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subjects;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use App\Repository\Question\QuestionRepositoryInterface;
use Mockery\Matcher\Subset;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function index()
    {

      $questions =  Question::all();
      return view('Question.index',compact('questions'));
    }

    public function create(){
        $quizzes = Quizze::all();
     
        return view('Question.create',compact('quizzes'));
    }

   
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        $quizzes = Quizze::all();
       
        return view('Question.edit', compact('question','quizzes'));
        
    }
    public function store($request)
    {
  
        DB::beginTransaction();

        try {
           Question::create([
            'title'=>$request->title,
            'answers'=>$request->answers,
            'right_answer'=>$request->right_answer,
            'quizze_id'=>$request->quizze_id,
            'score'=>$request->score
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

        DB::beginTransaction();

        try {

            Question::findOrFail($request->id)->update([
                'title'=>$request->title,
                'answers'=>$request->answers,
                'right_answer'=>$request->right_answer,
                'quizze_id'=>$request->quizze_id,
                'score'=>$request->score
               ]);


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Question.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Question::destroy($request->id);

        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Question.index');
    }
}
