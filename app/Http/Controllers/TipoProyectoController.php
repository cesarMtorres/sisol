<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoProyecto;
use App\Http\Requests\TipoProyectoRequest;
class TipoProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tproyectos=TipoProyecto::search($request->nombre)->OrderBy('id','ASC')->paginate(20);
        return view('tproyecto.index',compact('tproyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tproyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoProyectoRequest $request)
    {
        //
       $tproyecto= new TipoProyecto($request->all());
       $tproyecto->save();
       return redirect()->route('tproyecto.index')->with('success','Registro creado satisfactoriamente');         
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
        $tproyectos=TipoProyecto::findOrFail($id);
        return view('tproyecto.show',compact('tproyectos'));
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
        $tproyectos=TipoProyecto::findOrFail($id);
        return view('tproyecto.edit',compact('tproyectos'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoProyectoRequest $request, $id)
    {
        //
        $validated=$request->validated();
        TipoProyecto::find($id)->update($request->all());
        return redirect()->route('tproyecto.index')->with('success','Registro actualizado satisfactoriamente');    
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
        TipoProyecto::find($id)->delete();
        return redirect()->route('tproyecto.index')->with('success','Registro eliminado satisfactoriamente');        
    }
}
