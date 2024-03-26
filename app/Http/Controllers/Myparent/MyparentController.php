<?php

namespace App\Http\Controllers\Myparent;

use App\Models\Myparent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MyparentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('livewire.show_form_wizard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Myparent $myparent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Myparent $myparent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Myparent $myparent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Myparent $myparent)
    {
        //
    }
}
