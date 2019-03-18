<?php

namespace App\Http\Controllers;
use App\Agremiado;
use Illuminate\Http\Request;

class AgremiadoController extends Controller
{
 public function index()
    {
        //
        $agremiados=Agremiado::orderBy('id','ASC')->paginate(20);
        return view('agremiado.index',compact('agremiados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agremiado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PruebaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PruebaRequest $request)
    {
           
      $validated=$request->validated();
       Agremiado::create($request->all());
            return redirect()->route('agremiado.index')->with('success','Registro creado satisfactoriamente'); 
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
        $agremiados=Agremiado::findOrFail($id);
        return view('agremiado.show',compact('agremiados'));
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
        $agremiados=Agremiado::findOrFail($id);
        return view('agremiado.edit',compact('agremiados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  PruebaRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PruebaRequest $Request, $id)
    {
        //
        $validated=$request->validated();
        Agremiado::find($id)->update($request->all());
        return redirect()->route('agremiado.index')->with('success','Registro actualizado satisfactoriamente');
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
        Agremiado::find($id)->delete();
        return redirect()->route('agremiado.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
