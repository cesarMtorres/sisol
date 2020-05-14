<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Charts;
use App\User;
use DB;

class ChartController extends Controller
{
    //
    public function index()
    {
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
                  ->title("Monthly new Register Users")
                  ->elementLabel("Total Users")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupByMonth(date('Y'), true);

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
                     ->colors(['#29c610','#cf1a10', '#f4fe15'])
                    ->values([$apro,$recha,$audi])
                    ->dimensions(1000,500)
                    ->responsive(true);
        return view('chart',compact('chart','pie'));
    }

     public function genero()
    {
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        

  $auditoria = DB::table('agremiado_especialidad')
    ->select('especialidad.nombre', 'especialidad.id', DB::raw('COUNT(especialidad.id) as cantidad'))
    ->join('agremiado', 'agremiado.id', '=', 'agremiado_especialidad.agremiado_id')
    ->join('especialidad', 'especialidad.id', '=', 'agremiado_especialidad.especialidad_id')
    ->groupBy('especialidad.id')
    ->get();
    $vamo=0;

$pie = Charts::create('pie', 'highcharts')
             ->title('My nice chart')
             ->elementLabel('My nice label')
             ->labels($auditoria->pluck('nombre'))
             ->values($auditoria->pluck('cantidad'))
             ->responsive(true);


       
  

        return view('chartgenero',compact('pie'));
 
    
  }
}