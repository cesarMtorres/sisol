<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ConfiguracionRequest;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $configuraciones=Configuracion::OrderBy('id','ASC')->paginate(20);
        return view('configuracion.index',compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('configuracion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfiguracionRequest $request)
    {
        //
       $validated=$request->validated();
       Configuracion::create($request->all());
       return redirect()->route('configuracion.index')->with('success','Registro creado satisfactoriamente'); 
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
        $configuraciones=Configuracion::findOrFail($id);
        return view('configuracion.show',compact('configuraciones'));
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
        $configuraciones=Configuracion::findOrFail($id);
        return view('configuracion.edit',compact('configuraciones'));
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
        $validated=$request->validated();
        Configuracion::find($id)->update($request->all());
        return redirect()->route('configuracion.index')->with('success','Registro actualizado satisfactoriamente');        
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
        Configuracion::find($id)->delete();
        return redirect()->route('configuracion.index')->with('success','register_shutdown_function(function) eliminado satisfactoriamente');    
    }

        public function subirLogo(Request $request)
    {
        $user = User::find($request->session()->get('id'));
        if (!is_null($user)) {
            $request->file('file')->store('public/usuarios/'.$request->session()->get('id'));
            
            $ruta = $request->file('file')->store('storage/usuarios/'.$request->session()->get('id'));
            $user->foto = $ruta;
            if ($user->save()){
                return response()->json(["Estado"=>"Subido"]);
            }
        }else{
            return response()->json(["Estado"=>"Error"]);
        }
        $request->session()->forget('idUsuario');    
    }
}
