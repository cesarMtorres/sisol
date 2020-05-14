<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ConfiguracionModal extends Controller
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
       $data = DB::table('agremiado_persona')
         ->select('persona.*', 'agremiado.*')
          ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
         ->where('civ', 'like', '%'.$query.'%')
         ->orWhere('nombre', 'like', '%'.$query.'%')
         ->orWhere('apellido', 'like', '%'.$query.'%')
         ->orWhere('direccion', 'like', '%'.$query.'%')
         ->orWhere('cedula', 'like', '%'.$query.'%')
         ->orderBy('nombre', 'desc')
         ->get();
          
      }
      else
      {
      /* $data = DB::table('persona')
         ->orderBy('nombre', 'desc')
         ->get();
*/
         $data = DB::table('agremiado_persona')
    ->select('persona.*', 'agremiado.*')
    ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
    ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr> 
         <td>'.$row->cedula.'</td>
         <td>'.$row->nombre.'</td>
         <td>'.$row->apellido.'</td>
         <td>'.$row->civ.'</td>
         <td><a title="Ver" class="btn btn-xs btn-info" href="'.action("ConfiguracionController@create2", $row->id) .'" ><span class="icon icon-eye"></span>Ver</a></td>
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
/*
SELECT per.id as per_id,per.nombre, per. apellido,per.cedula, agre.id as agre_id, agre.civ 
FROM agremiado_persona as puente
INNER JOIN agremiado AS agre ON agre.id = puente.agremiado_id 
INNER JOIN persona AS per ON per.id = puente.persona_id*/