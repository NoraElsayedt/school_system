<?php

namespace App\Http\Controllers\Exam;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Exam\ExamRepositoryInterface;

class ExamController extends Controller
{
    public $Exam;
     public function __construct(ExamRepositoryInterface $Exam)
     {
        $this->Exam = $Exam ;
     }
    public function index()
    {
        return $this->Exam->index();
    }


    public function create()
    {
      return $this->Exam->create();
    }

    public function store(Request $request)
    {
        return $this->Exam->store($request);
    }

  
    public function show($id)
    {
        return $this->Exam->show($id);
    }

   
    public function edit($id)
    {
        return $this->Exam->edit($id);
    }

  
    public function update(Request $request)
    {
        return $this->Exam->update($request);
    }

   
    public function destroy(Request $request)
    {
        return $this->Exam->destroy($request);
    }
}
