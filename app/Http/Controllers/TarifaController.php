<?php

namespace App\Http\Controllers;
use App\Tarifa;
use Illuminate\Http\Request;
use App\Http\Requests\TarifaRequest;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tarifas=Tarifa::search($request->nombre)->OrderBy('id','ASC')->paginate(20);
        return view('tarifa.index',compact('tarifas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tarifa.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifaRequest $request)
    {
        //

      $tarifa= new Tarifa($request->all());
      $tarifa->fecha_ini=strftime("%Y-%m-%d", strtotime($request->fecha_ini)); //GENIUS
      $tarifa->fecha_fin=strftime("%Y-%m-%d", strtotime($request->fecha_fin));
       $tarifa->save();
       return redirect()->route('tarifa.index')->with('success','Registro creado satisfactoriamente');     
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
        $tarifas=Tarifa::findOrFail($id);
        return view('tarifa.show',compact('tarifas'));
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
        $tarifas=Tarifa::findOrFail($id);
        return view('tarifa.edit',compact('tarifas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Tarifa::find($id)->update($request->all());
        return redirect()->route('tarifa.index')->with('success','Registro actualizado satisfactoriamente');
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
        Tarifa::find($id)->delete();
        return redirect()->route('tarifa.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
