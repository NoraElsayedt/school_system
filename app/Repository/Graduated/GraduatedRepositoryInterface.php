<?php

namespace App\Repository\Graduated;

interface GraduatedRepositoryInterface{
    public function GetGrades();
    public function getAll();
    public function studentGraduated($request);
    public function studentReturn($request);
    public function studentDelete($request);
   
 

}