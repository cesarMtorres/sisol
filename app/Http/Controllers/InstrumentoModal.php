<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\BancoController;

class InstrumentoModal extends Controller
{
    function index()
    {
     return view('live_search');
    }

     public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('instrumento')
         ->where('nombre', 'like', '%'.$query.'%')
         ->orwhere('descripcion', 'like', '%'.$query.'%')
         ->orderBy('nombre', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('instrumento')
         ->orderBy('nombre', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->nombre.'</td>
         <td>'.$row->descripcion.'</td>
        <td><a title="Ver" class="btn btn-xs btn-info" href="'.action("InstrumentoController@show", $row->id) .'" ><span class="icon icon-eye"></span>Ver</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Encontrado</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}

