<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Persona;
class SolvenciatModal extends Controller
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
         ->select('persona.*', 'agremiado.*','agremiado_persona.*', 'solvencia_tecnica.*')
          ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
    ->join('solvencia_tecnica', 'solvencia_tecnica.agremiado_id', '=', 'agremiado_persona.agremiado_id')
         ->where('nombre', 'like', '%'.$query.'%')
         ->orWhere('apellido', 'like', '%'.$query.'%')
         ->orWhere('cedula', 'like', '%'.$query.'%')
         ->orderBy('nombre', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('agremiado_persona')
    ->select('persona.*', 'agremiado.*', 'agremiado_persona.*','solvencia_tecnica.*')
    ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
    ->join('solvencia_tecnica', 'solvencia_tecnica.agremiado_id', '=', 'agremiado_persona.agremiado_id')
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
         <td>'.$row->tipo_certificado.'</td>
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

