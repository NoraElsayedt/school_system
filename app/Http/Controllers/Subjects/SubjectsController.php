<?php

namespace App\Http\Controllers\Subjects ;

use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Subjects\SubjectsRepositoryInterface;

class SubjectsController extends Controller
{
    public $Subjects ;
    public function __construct(SubjectsRepositoryInterface $Subjects)
    {
        $this->Subjects = $Subjects;
    }
    public function index()
    {
        return $this->Subjects->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Subjects->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Subjects->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Subjects->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Subjects->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Subjects->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Subjects->destroy($request);
    }
}
