<?php

namespace App\Http\Controllers;
use App\TipoPago;
use Illuminate\Http\Request;
use App\Http\Requests\TipoPagoRequest;
class TipoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tpagos=TipoPago::orderBy('id','ASC')->paginate(20);
        return view('tpago.index',compact('tpagos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tpago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPagoRequest $request)
    {
        //
        $validated=$request->validated();
        TipoPago::create($request->all());
        return redirect()->route('tpago.index')->with('success','Registro creado satisfactoriamente');
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
        $tpagos=TipoPago::findOrFail($id);
        return view('tpagos.show',compact('tpagos'));
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
        $tpagos=TipoPago::findOrFail($id);
        return view('tpagos.edit',compact('tpagos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoPagoRequest $request, $id)
    {
        //
    $validated=$request->validated();
    TipoPago::find($id)->update($request->all());
    return redirect()->route('tpago.index')->with('success','Registro Actualizado satisfactoriamente');
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
        TipoPago::find($id)->delete();
        return redirect()->route('tpago.index')->with('success','Registro Eliminado satisfactoriamente');
    }
}
