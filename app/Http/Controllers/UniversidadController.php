<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Universidad;
use App\Http\Requests\UniversidadRequest;

class UniversidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $universidades=Universidad::OrderBy('id','ASC')->paginate(20);

        return view('universidad.index',compact('universidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('universidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversidadRequest $request)
    {
        //
        $universidad= new universidad($request->all());
       $universidad->save();
       return redirect()->route('universidad.index')->with('success','Registro creado satisfactoriamente');
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
                $universidades=Universidad::findOrFail($id);
        return view('universidad.show',compact('universidades'));
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
                $universidades=Universidad::findOrFail($id);
        return view('universidad.edit',compact('universidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UniversidadRequest $request, $id)
    {
        //
        $validated=$request->validated();
        Universidad::find($id)->update($request->all());
        return redirect()->route('universidad.index')->with('success','Registro actualizado satisfactoriamente');

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

         Universidad::find($id)->delete();
        return redirect()->route('universidad.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
