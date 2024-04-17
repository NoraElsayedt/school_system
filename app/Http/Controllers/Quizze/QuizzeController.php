<?php

namespace App\Http\Controllers\Quizze;

use App\Models\Quizze;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Quizze\QuizzeRepositoryInterface;

class QuizzeController extends Controller
{
    public $Quizze ;

    public function __construct(QuizzeRepositoryInterface $Quizze)
        {
    
            $this->Quizze = $Quizze;
    }
   
    public function index()
    {
    return $this->Quizze->index();
    }

    public function create()
    {
        return $this->Quizze->create();
    }

    public function store(Request $request)
    {
        return $this->Quizze->store($request);
    }

  
    public function show(Quizze $quizze)
    {
        //
    }

    public function edit($id)
    {
        return $this->Quizze->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Quizze->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Quizze->destroy($request);
    }
}
