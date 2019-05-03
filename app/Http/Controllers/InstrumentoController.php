<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instrumento;
use App\InstrumentoClasificacion;
use App\Http\Requests\IntrumentoRequest;

class InstrumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $instrumentos=Instrumento::search($request->nombre)->orderBy('id','ASC')->paginate(20);
        return view('baremo.index',compact('instrumentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $clasificaciones = InstrumentoClasificacion::select('id','nombre')->orderBy('nombre','ASC')
        ->get();
        return view('baremo.create',compact('clasificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IntrumentoRequest $request)
    {
        //
    $instrumento= new Instrumento($request->all());
    $instrumento->save();
    return redirect()->route('baremo.index')->with('success','Registro creado satisfactoriamente'); 
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
        $instrumentos=Instrumento::where('id','=',$id)->with('instrumentoclasificion')->get();
        return view('baremo.show',compact('instrumentos'));
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
        $instrumentos=Instrumento::findOrFail($id);
        return view('baremo.edit',compact('instrumentos'));
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
        Instrumento::find($id)->delete();
        return redirect()->route('baremo.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
