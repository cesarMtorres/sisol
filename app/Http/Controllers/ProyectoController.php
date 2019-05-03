<?php

namespace App\Http\Controllers;
use App\Proyecto;
use App\Instituto;
use App\TipoProyecto;
use Illuminate\Http\Request;
use App\Http\Requests\ProyectoRequest;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $proyectos=Proyecto::search($request->nombre)->OrderBy('id','ASC')->paginate(20);
        return view('proyecto.index',compact('proyectos'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tps = TipoProyecto::select('id','nombre')->orderBy('nombre','ASC')
        ->get();
        $ins = Instituto::select('id','nombre')->orderBy('nombre','ASC')
        ->get();
        return view('proyecto.create',compact('tps','ins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoRequest $request)
    {
        //
       $proyectos= new Proyecto($request->all());
       $proyectos->save();
       return redirect()->route('proyecto.index')->with('success','Registro creado satisfactoriamente'); 
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
        $proyectos=Proyecto::findOrFail($id);
        return view('proyecto.show',compact('proyectos'));        
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
        $proyectos=Proyecto::findOrFail($id);
        return view('proyecto.edit',compact('proyectos'));
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
        Proyecto::find($id)->update($request->all());
        return redirect()->route('proyecto.index')->with('success','Registro actualizado satisfactoriamente');
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
        Proyecto::find($id)->delete();
        return redirect()->route('proyecto.index')->with('success','Registro eliminado satisfactoriamente');    
    }
}
