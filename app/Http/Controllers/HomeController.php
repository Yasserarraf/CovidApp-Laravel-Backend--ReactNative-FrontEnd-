<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fiche;
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
        $fiches = Fiche::all();
        $NFiches = Count(Fiche::Where('result','negative')->get());
        $PFiches = Count(Fiche::Where('result','positive')->get());
        return view('home',compact('NFiches','PFiches'));
    }
}
