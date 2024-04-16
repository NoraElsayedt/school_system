<?php

namespace App\Http\Controllers\Attendance ;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Attendance\AttendanceRepositoryInterface;

class AttendanceController extends Controller
{
  public $attendance ;
  public function __construct(AttendanceRepositoryInterface $attendance)
  {
    $this->attendance = $attendance;
  }
    public function index()
    {
     return $this->attendance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->attendance->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       
    }
}
