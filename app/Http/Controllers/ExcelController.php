<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
        public function descargarPlantilla()
    {
    	$pathToFile = storage_path()."/excel/PLANTILLA_AGREMIADO.xlsx";
    	return response()->download($pathToFile);
    }
}
