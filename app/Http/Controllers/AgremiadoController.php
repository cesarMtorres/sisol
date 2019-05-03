<?php

namespace App\Http\Controllers;
use App\Agremiado;
use Illuminate\Http\Request;
use App\Http\Requests\AgremiadoRequest;
use App\Persona;
use App\Especialidad;

class AgremiadoController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }


 public function index()
    {
        //
       // $agremiados=Agremiado::orderBy('id','ASC')->paginate(20);
  /*      $personas=Persona::orderBy('id','ASC')->paginate(20);
         $agremiados->each(function($agremiados){
            $agremiados->personas;
            $agremiados->especialidades;
        });*/
        $agremiados=Agremiado::all();
        return view('agremiado.index',compact('agremiados'));
    }


    public function getAgremiadoxPersona(Request $request)
    {
        $agremiados = Agremiado::join('agremiado_persona as ap','persona.id','=',
            'ap.agremiado_id')
                ->select('persona.id as id',DB::raw("CONCAT(persona.apellido,' ',persona.nombre) AS alumno"),'agremiado.correo AS correo')
                ->where('agremiado_id',$request->id)
                ->orderBy('apellido','ASC')
                ->get();

        return $agremiados;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $especialidades=Especialidad::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('agremiado.create',compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PruebaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
      //$validated=$request->all();
      $agremiado=new Agremiado($request->all());
      $agremiado->save();
    // $agremiado=Agremiado::find($request->civ);
      $especialidades=Especialidad::find($request->especialidades);
      $agremiado->especialidades()->attach($especialidades);
      $persona=new Persona($request->all());
   /*   $persona->nombre =$request->nombre;
      $persona->cedula  =$request->cedula;
      $persona->apellido =$request->apellido;
      $persona->direccion =$request->direccion; 
      $persona->telefono =$request->telefono;
      $persona->correo =$request->correo;*/
      $persona->save();
      $agremiado->personas()->attach($persona);


   /*   if($request->ajax()){
        if(is_array($request->especialidades)){
            foreach($request->especialidades as $especialidad){
                if($especialidad !=null)
                    if(!$agremiado->especialidades()->where('especialidad_id',$especialidad)->exits())
                        $agremiado->especialidades()->attach($especialidad);
                   return redirect()->route('agremiado.index')->with('success','Registro actualizado satisfactoriamente');
            }
        }else{
            if($request->especialidades !=null)
                if(!$agremiado->especialidades()->where('especialidad_id',$request->especialidades)->exits())
                    $agremiado->especialidades()->attach($request->especialidades);
                return redirect()->route('agremiado.index')->with('success','Registro actualizado satisfactoriamente');
        }

      }*/
      // Agremiado::create($request->all());
            return redirect()->route('agremiado.index')->with('success','Registro actualizado satisfactoriamente');
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
        $agremiados=Agremiado::where('id','=',$id)->with('personas')->with('especialidades')->get();
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
       $agremiados=Agremiado::where('id','=',$id)->with('personas')->get();
        return view('agremiado.edit',compact('agremiados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  PruebaRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgremiadoRequest $Request, $id)
    {
        //
        $validated=$request->validated();
        $persona=new Persona($request->all());
        $persona->cedula= $request->cedula;
        Agremiado::find($id)->update($request->all());
        Persona::find($persona->cedula)->update($request->all());
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
