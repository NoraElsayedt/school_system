<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      

        return view('auth.selection');
    }

  

    public function dashboard()
    {
        return view('home');
    }

    public function dashboardstudent()
    {
        return view('home_student');
    }

    public function dashboardteacher(){
        return view('home_teacher');
    }

    public function dashboardparent(){
        return view('home_parent');
    }

}
