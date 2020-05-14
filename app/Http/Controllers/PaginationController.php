<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PaginationController extends Controller
{
    function index()
    {
     $cepir = DB::table('cepir')->paginate(5);
     return view('solvenciat.index2', compact('cepir'));
    }

    function fetch_data(Request $request) 
    {
     if($request->ajax())
     {
      $cepir = DB::table('cepir')->paginate(5);
      return view('solvenciat.index2', compact('cepir'))->render();
     }
    }
}
?>