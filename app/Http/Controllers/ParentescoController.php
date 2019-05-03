<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParentescoRequest;
use App\Parentesco;

class ParentescoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $parentescos=Parentesco::search($request->nombre)->OrderBy('id','ASC')->paginate(10);
        return view('parentesco.index',compact('parentescos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('parentesco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParentescoRequest $request)
    {
        //
        $validated=$request->validated();
        Parentesco::create($request->all());
        return redirect()->route('parentesco.index')->with('success','Registro creado satisfactoriamente'); 
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
        $parentescos=Parentesco::findOrFail($id);
        return view('parentesco.show',compact('parentescos'));

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
        $parentescos=Parentesco::findOrFail($id);
        return view('parentesco.edit',compact('parentescos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParentescoRequest $request, $id)
    {
        //
        $validated=$request->validated();
        Parentesco::find($id)->update($request->all());
        return redirect()->route('parentesco.index')->with('success','Registro actualizado satisfactoriamente');
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
        parentesco::find($id)->delete();
        return redirect()->route('parentesco.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
