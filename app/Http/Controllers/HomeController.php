<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  RealRashid\SweetAlert\SweetAlertServiceProvider ;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexAdmin()
    {
        return view('adminHome');
    }
}
