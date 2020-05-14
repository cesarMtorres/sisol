<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Http\Requests\BancoRequest;
use Carbon;
use PDF;
use DB;

class BancoController extends Controller
{

    public function __construct()
    {

      $this->middleware('permission:agremiado.create')->only(['create','store']);
      $this->middleware('permission:agremiado.index')->only(['index']);
      $this->middleware('permission:agremiado.edit')->only(['edit', 'update']);
      $this->middleware('permission:agremiado.show')->only(['show']);
      $this->middleware('permission:agremiado.destroy')->only(['destroy']);

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $bancos=Banco::search($request->name)->OrderBy('id','ASC')->paginate(10);
        return view('banco.index',compact('bancos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('banco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $banco= new Banco($request->all());
       $banco->save();
       return redirect()->route('banco.index')->with('success','Registro creado satisfactoriamente');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bancos=Banco::findOrFail($id);
        return view('banco.show',compact('bancos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bancos=Banco::findOrFail($id);
        return view('banco.edit',compact('bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BancoRequest $request, $id)
    {
        $validated=$request->validated();
        Banco::find($id)->update($request->all());
        return redirect()->route('banco.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banco::find($id)->delete();
        return redirect()->route('banco.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function imprimir()
    {
         
        $key=1;

           $bancos=Banco::get();

          $mytime = Carbon\Carbon::now();
   
      $pdf = \PDF::loadView('banco.imprimir',compact('bancos','mytime','key'));

        return $pdf->download('imprimir.pdf');
    }
}
