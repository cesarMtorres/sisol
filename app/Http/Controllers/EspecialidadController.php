<?php

namespace App\Http\Controllers;
use App\Especialidad;
use Illuminate\Http\Request;
use App\Http\Requests\EspecialidadRequest;
use DB;
use PDF;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $especialidades=Especialidad::search($request->name)->OrderBy('id','ASC')->paginate(5);
        return view('especialidad.index',compact('especialidades'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadRequest $request)
    {
        //
        $especialidad= new Especialidad($request->all());
       $especialidad->save();
       return redirect()->route('especialidad.index')->with('success','Registro creado satisfactoriamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $especialidades=Especialidad::findOrFail($id);
        return view('especialidad.show',compact('especialidades'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $especialidades=Especialidad::findOrFail($id);
        return view('especialidad.edit',compact('especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadRequest $request, $id)
    {
        //
        $validated=$request->validated();
        Especialidad::find($id)->update($request->all());
        return redirect()->route('especialidad.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Especialidad::find($id)->delete();
        return redirect()->route('especialidad.index')->with('success','Registro eliminado satisfactoriamente');
    }
}



 function get_customer_data()
    {
     $customer_data = DB::table('especialidad')
         ->limit(10)
         ->get();
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



      <h3 align="center">Especialdiades registradas</h3>

     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Nombre</th>
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->nombre.'</td>

      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
