<?php

namespace App\Http\Controllers\Library ;

use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Library\LibraryRepositoryInterface;

class LibraryController extends Controller
{
   public $library;
   public function __construct(LibraryRepositoryInterface $library)
   {
   $this->library = $library;
    
   }
    public function index()
    {
       return $this->library->index();
    }

   
    public function create()
    {
        return $this->library->create();
    }

 
    public function store(Request $request)
    {
        return $this->library->store($request);
    }

 
    public function show(Library $library)
    {
        //
    }

    
    public function edit($id)
    {
        return $this->library->edit($id);
    }

 
    public function update(Request $request)
    {
        return $this->library->update($request);
    }

   
    public function destroy(Request $request)
    {
        return $this->library->destroy($request);
    }
    public function downloadAttachment($id){
        return $this->library->downloadAttachment($id);
    }
}
