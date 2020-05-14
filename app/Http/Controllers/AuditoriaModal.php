<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;

class AuditoriaModal extends Controller
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
         ->select('persona.*', 'agremiado.*', 'persona.id as idper','agremiado.id as idagre')
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
    ->select('persona.*', 'agremiado.*', 'persona.id as idper','agremiado.id as idagre')
    ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
    ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $mytime = Carbon\Carbon::now();
        $payments= DB::table('tarifa_solvencia')
            ->select('tarifa_id')
            ->where('agremiado_id',$row->idper);


            $students = DB::table('tarifa')
            ->whereNull('deleted_at')
            ->whereNotIn('id',$payments)
             ->whereBetween('fecha_ini', ['2019-01-01', date('Y-m-d', strtotime($mytime))])
            ->get();

           if($students->count() < 1){
            $students=['SOLVENTE'];

            }
            else{

                 $students=['DEUDOR'];
            }

             foreach($students as $fila)
       {

        if ($fila=='SOLVENTE') {
          # code...
        
         
            
        $output .= '
        <tr> 
         <td>'.$row->cedula.'</td>
         <td>'.$row->nombre.'</td>
         <td>'.$row->apellido.'</td>
         <td>'.$row->civ.'</td>
         <td><span class="label label-success">'.$fila.'</span></td>
         <td><a title="ver"  class="btn btn-xs btn-info" href="'.action("AuditoriaController@show", $row->idagre) .'" ><span class="icon icon-eye"></span>ver</a></td>
        </tr>



        ';}else{

           $output .= '
        <tr> 
         </td>
        </tr>



        ';

        }

      }
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
      compact('data');
       
     }
     
    }
}

