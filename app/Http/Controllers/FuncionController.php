<?php

namespace App\Http\Controllers;
use App\Funcion;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionRequest;
class FuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //search($request->nombre)->
        $funciones=Funcion::all();
        return view('funcion.index',compact('funciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('funcion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionRequest $request)
    {
        //
        $funcion=new Funcion($request->all());
        $funcion->save();
        return redirect()->route('funcion.index');
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
        $funciones=Funcion::findOrFail($id);
        return view('funcion.show',compact('funciones'));
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
        $funciones=Funcion::findOrFail($id);
        return view('funcion.edit',compact('funciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionRequest $request, $id)
    {
        //
        $validated=$request->validated();
        Funcion::find($id)->update($request->all());
        return redirect()->route('funcion.index')->with('success','Registro actualizado satisfactoriamente');
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
        Funcion::find($id)->delete();
        return redirect()->route('funcion.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
