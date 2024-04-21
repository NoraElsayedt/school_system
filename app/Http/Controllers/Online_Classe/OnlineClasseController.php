<?php

namespace App\Http\Controllers\Online_Classe;

use Illuminate\Http\Request;
use App\Models\Online_Classe;
use App\Http\Controllers\Controller;
use App\Repository\Online_Classe\Online_ClasseRepositoryInterface;
class OnlineClasseController extends Controller
{
    public $Online_Classe;
    public function __construct(Online_ClasseRepositoryInterface $Online_Classe)
    {
        $this->Online_Classe = $Online_Classe;
    }
    public function index()
    {
        return $this->Online_Classe->index();
        
    }

  
    public function create()
    {
      return $this->Online_Classe->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Online_Classe->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Online_Classe $online_Classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Online_Classe $online_Classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Online_Classe $online_Classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Online_Classe->destroy($request);
    }
}
