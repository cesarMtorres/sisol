<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::select('select * from especialidad WHERE deleted_at is null');
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '

     <img src="images/logo.PNG" height="70" alt="SISOL" align="left" />

     <img src="images/logo_colegio.png" height="70" alt="SISOL" align="right" />

     <br>
      <br>


      <h3 align="center">Especialidades registradas</h3>

      <br>
      <br>

     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:2px;" width="1%">Item</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Nombre</th>
   </tr>
     ';  
     foreach($customer_data as $key=>$customer)
     {
      $key=$key+1;
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$key.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->nombre.'</td>

      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}