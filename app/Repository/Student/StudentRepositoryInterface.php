<?php

namespace App\Repository\Student;

interface StudentRepositoryInterface{


  
    public function getGenders();
    public function getNationalitie();
    public function getbloods();
    public function getmy_classes();
    public function getParent();
    public function getClassroombyAjex($grade_id);
    public function getSectionByAjex($classroomId);
    public function insertStudent($request);
    public function getAllStudents();
    public function showStudent($id);
    public function updatestudent($request);
    public function deletestudent($request);
    

}