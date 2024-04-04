<?php

namespace App\Repository\Fee;

interface FeeRepositoryInterface{
    
   public function index();
   public function create();
   public function store($request);
   public function edit($id);
   public function GetGrades();
   public function update($request);
   public function destroy($request);

 

}