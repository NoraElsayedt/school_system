<?php

namespace App\Repository\Teacher;

interface TeacherRepositoryInterface{


    public function getAllTeachers();
    public function getspecialization();
    public function getgender();
    public function insertTeacher($request);
    public function editTeacher($id);
    public function updateTeacher($request);
    public function deleteTeacher($request);

}