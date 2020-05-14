<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Empresa;
use Carbon;
use PDF;
use DB;

class EmpresaController extends Controller
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
        
        $empresa=Empresa::search($request->nombre)->OrderBy('id','ASC')->paginate(20);
        return view('empresa.index',compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        //
       $empresa= new Empresa($request->all());
       $empresa->save();
       return redirect()->route('empresa.index')->with('success','Registro creado satisfactoriamente'); 
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
        $empresa=Empresa::findOrFail($id);
        return view('empresa.show',compact('empresa'));
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
        $empresa=Empresa::findOrFail($id);
        return view('empresa.edit',compact('empresa'));
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

        Empresa::find($id)->update($request->all());
        return redirect()->route('empresa.index')->with('success','Registro actualizado satisfactoriamente');
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
        Empresa::find($id)->delete();
        return redirect()->route('empresa.index')->with('success','Registro eliminado satisfactoriamente');        
    }

       public function imprimir()
    {
         
        $key=1;

           $empresas=Empresa::get();

          $mytime = Carbon\Carbon::now();
   
      $pdf = \PDF::loadView('empresa.imprimir',compact('empresas','mytime','key'));

        return $pdf->download('imprimir.pdf');
    }
}

