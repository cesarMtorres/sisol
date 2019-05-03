<?php

namespace App\Http\Controllers;
use App\Perfil;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;
class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //search($request->nombre)->
        $perfiles=Perfil::all();
        return view('perfil.index',compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('perfil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilRequest $request)
    {
        //
        $perfil=new Perfil($request->all());
        $perfil->save();
        return redirect()->route('perfil.index');
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
        $perfiles=Perfil::findOrFail($id);
        return view('perfil.show',compact('perfiles'));
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
        $perfiles=Perfil::findOrFail($id);
        return view('perfil.edit',compact('perfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilRequest $request, $id)
    {
        //
         $validated=$request->validated();
        Perfil::find($id)->update($request->all());
        return redirect()->route('perfil.index')->with('success','Registro actualizado satisfactoriamente');
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
         Perfil::find($id)->delete();
        return redirect()->route('perfil.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
