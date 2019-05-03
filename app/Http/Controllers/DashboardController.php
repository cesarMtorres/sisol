<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function __construct(){ //CONSTRUCTOR agregado para evitar que usuarios no autenticados esten en el dashboard y redirecciona al login
    //	$this->middleware('auth');
    }
    public function index()
    {
    	return view('admin.dashboard');
    }
}
