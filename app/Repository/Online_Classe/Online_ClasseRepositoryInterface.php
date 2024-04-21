<?php

namespace App\Repository\Online_Classe;

interface Online_ClasseRepositoryInterface{

    public function index();
    public function create();
 
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);

}