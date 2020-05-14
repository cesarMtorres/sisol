<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BancoRequest;
use App\Criterio; 
use Carbon;
use PDF;
use DB;

class CriterioController extends Controller
{

    public function __construct()
    {

  
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

         $criterio=Criterio::search($request->nombre)->OrderBy('id','ASC')->paginate(20);




        return view('criterio.index',compact('criterio'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // llamar a todas las tablas

        $tablas = DB::select('SHOW FULL TABLES FROM sisol');




       
        //que segun la tabla se filtren sus campos
        $data = DB::select('show columns from banco');





        return view('criterio.create', compact('tablas','data'));
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
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

       public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data = DB::select('show columns from banco');
         
      }
      else
      {
        $data = DB::select('show columns from banco');
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
       
 
         <option value="">'.$row->Field.'</option>
       
        ';
       }
      }
      else
      {
       $output = '
        <option value="">No Hay nada</option>

       
       ';
      }
      $data = array(
       'table_data'  => $output
      );

      echo json_encode($data);
     }
    }

     public function getCareers(Request $request)
    {
        if ($request->ajax()) {
            $careers = Banco::where('id', 1)->get();
            foreach ($careers as $career) {
                $careersArray[$career->id] = $career->nombre;
            }
            return response()->json($careersArray);
        }
    }


    
}
