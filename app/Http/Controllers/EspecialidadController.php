<?php

namespace App\Http\Controllers;
use App\Especialidad;
use Illuminate\Http\Request;
use App\Http\Requests\EspecialidadRequest;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $especialidades=Especialidad::OrderBy('id','ASC')->paginate(20);
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
    public function update(ProyectoRequest $request, $id)
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
