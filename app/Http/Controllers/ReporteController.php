<?php

namespace App\Http\Controllers;

use App\Agremiado;
use Illuminate\Http\Request;
use App\Http\Requests\AgremiadoRequest;
use App\Persona;
use App\Especialidad; 
use App\Universidad; 
use Carbon;  
use PDF;
use Illuminate\Support\Facades\Input;
use DB; 
use Charts;
use App\SolvenciaTecnica;
use App\User;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

            $mytime = Carbon\Carbon::now();
        
        return view('reporte.index', compact('mytime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         return view('reporte.create');
        
       
    }

    public function solvencia()
    {
        $mytime = Carbon\Carbon::now();
         return view('reporte.solvencia', compact('mytime'));
        
       
    }

     public function solvenciaestadistica()
    {
        $mytime = Carbon\Carbon::now();

       $users = Agremiado::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
       

        $auditoria= DB::table('view_auditoria_status_total')
         ->get();

         $apro = 0;
         $recha = 0;
         $audi = 0;

         foreach ($auditoria as $vamos) {

           $apro = $vamos->aprobados;
         $recha = $vamos->rechazados;
         $audi = $vamos->auditando;
          
         }

        $pie  =  Charts::create('pie', 'highcharts')
                    ->title('Auditorias')
                    ->labels(['Aprobados', 'Rechazados', 'Auditando'])
                     ->colors(['#006eff','#f30000', '#d1d1d1'])
                    ->values([$apro,$recha,$audi])
                    ->dimensions(1000,500)
                    ->responsive(true);

                    $solvenciat = SolvenciaTecnica::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();


        $area=   Charts::database($solvenciat,'area', 'highcharts')
                      ->title("Solvencias tecnicas en el mes por dia")
                  ->elementLabel("Solvencias")
                  ->dimensions(900, 500)
                  ->responsive(true)
                   ->groupByDay();


                   $data = DB::table('tipos_pago_realizados')
                            ->select('*')
                             ->get();

                             $chart = Charts::create('pie', 'highcharts')
             ->title('Tipo de pago mas usado')
             ->elementLabel('Tipo de pago mas usado')
             ->colors(['#006eff','#f30000', '#d1d1d1','#368d1a'])
             ->labels($data->pluck('nombre'))
             ->values($data->pluck('cuenta'))
             ->responsive(true);

/*
select agremiado.id, COUNT(1) AS total, agremiado.civ
from agremiado_persona
INNER join agremiado on agremiado.id= agremiado_persona.agremiado_id
INNER JOIN persona on persona.id=agremiado_persona.persona_id
inner join solvencia_tecnica on solvencia_tecnica.agremiado_id=agremiado_persona.agremiado_id
GROUP BY agremiado.id


*/

       
  
         return view('reporte.solvencia.estadistica', compact('mytime','chart','pie','area'));
        
       
    }
        public function cepir()
    {

         return view('reporte.cepir');
        
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BancoRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

      public function imprimir(Request $request)    {

        
        $key=1;
        $output = '';
          $agremiados = DB::table('agremiado_persona')
    ->select('persona.*', 'agremiado.*', 'universidad.nombre as uni')
    ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
    ->join('universidad', 'universidad.id', '=', 'agremiado.universidad_id')
    ->whereBetween('persona.created_at', [date('Y-m-d', strtotime($request->fecha_ini)),date('Y-m-d', strtotime($request->fecha_fin))])
    ->get();




          $mytime = Carbon\Carbon::now();
      //  echo $mytime->format('d-m-Y');
      
        $pdf = \PDF::loadView('reporte.agremiado.agremiado_fecha',compact('agremiados','mytime','key'));

        return $pdf->download('imprimir.pdf');

        
    }

     public function imprimirnacimiento(Request $request)    {

        
        $key=1;
          $agremiados = DB::table('agremiado_persona')
    ->select('persona.*', 'agremiado.*', 'universidad.nombre AS uni')
    ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
    ->join('universidad', 'universidad.id', '=', 'agremiado.universidad_id')
   ->whereBetween('persona.created_at', [date('Y-m-d', strtotime($request->fecha_ini)),date('Y-m-d', strtotime($request->fecha_fin))])
    ->get();


          $mytime = Carbon\Carbon::now();
      //  echo $mytime->format('d-m-Y');
      
        $pdf = \PDF::loadView('reporte.agremiado.agremiado_fecha',compact('agremiados','mytime','key'));

        return $pdf->download('imprimir.pdf');

        
    }

    public function imprimirsolvencia(Request $request)    {

        
        $key=1;
         $output= "";
           $agremiados = DB::table('agremiado_persona')
    ->select('persona.*', 'agremiado.*', 'persona.id as idper')
    ->join('agremiado', 'agremiado.id', '=', 'agremiado_persona.agremiado_id')
    ->join('persona', 'persona.id', '=', 'agremiado_persona.persona_id')
    ->get();
      

  
            foreach ($agremiados as  $value) {
                # code...
            

$payments= DB::table('tarifa_solvencia')
            ->select('tarifa_id')
            ->where('agremiado_id',$value->idper);


            $students = DB::table('tarifa')
            ->whereNull('deleted_at')
            ->whereNotIn('id',$payments)
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
         <td>'.$value->cedula.'</td>
         <td>'.$value->nombre.'</td>
         <td>'.$value->apellido.'</td>
         <td>'.$value->civ.'</td>
         <td><span class="label label-success">'.$fila.'</span></td>
        
        </tr>



        ';}else{

           $output .= '
        <tr> 
         <td>'.$value->cedula.'</td>
         <td>'.$value->nombre.'</td>
         <td>'.$value->apellido.'</td>
         <td>'.$value->civ.'</td>
         <td><span class="label label-danger">'.$fila.'</span></td>
         
        </tr>



        ';

        }

      }
        }
        
          

          $mytime = Carbon\Carbon::now();
      //  echo $mytime->format('d-m-Y');

        $pdf = \PDF::loadView('reporte.solvencia.reporte_solvencia_administrativa',compact('agremiados','mytime','key','output','payments'));

        return $pdf->download('imprimir.pdf');

        
    }
}
