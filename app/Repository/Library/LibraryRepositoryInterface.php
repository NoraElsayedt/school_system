<?php

namespace App\Repository\Library;

interface LibraryRepositoryInterface{

    public function index();
    public function create();
    public function downloadAttachment($id);
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);

}