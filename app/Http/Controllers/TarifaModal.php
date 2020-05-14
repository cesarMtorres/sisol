<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\BancoController;

class TarifaModal extends Controller
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
       $data = DB::table('tarifa')
         ->where('nombre', 'like', '%'.$query.'%')
         ->whereNull('deleted_at')
         ->orwhere('monto', 'like', '%'.$query.'%')
         ->orderBy('nombre', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('tarifa')
       ->whereNull('deleted_at')
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
          <td>'.$row->monto.'</td>
           <td>'.$row->fecha_ini.'</td>
        <td><a title="Ver" class="btn btn-xs btn-info" href="'.action("TarifaController@show", $row->id) .'" ><span class="icon icon-eye"></span>Ver</a></td>
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

