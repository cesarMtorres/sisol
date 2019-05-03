<?php

namespace App\Http\Controllers;
use App\Pago;
use Illuminate\Http\Request;
use App\Http\Requests\PagoRequest;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $pagos=Pago::search($request->nombre)->orderBy('id','ASC')->paginate(20);
        return view('pago.index',compact('pagos'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pago.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagoRequest $request)
    {
        //
        $validated=$request->validated();
        Pago::create($request->all());
        return redirect()->route('pago.index')->with('success','Registro creado satisfactoriamente');        
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
        $pagos=Pago::findOrFail($id);
        return view('pagos.show',compact('pagos'));
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
        $pagos=Pago::findOrFail($id);
        return view('pagos.edit',compact('pagos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagoRequest $request, $id)
    {
        //
    $validated=$request->validated();
    Pago::find($id)->update($request->all());
    return redirect()->route('pago.index')->with('success','Registro Actualizado satisfactoriamente');        
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
        Pago::find($id)->delete();
        return redirect()->route('pago.index')->with('success','Registro Eliminado satisfactoriamente');        
    }
}
