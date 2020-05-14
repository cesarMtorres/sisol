<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DbDumper;
use PHPUnit\Framework\TestCase;
use Spatie\DbDumper\Databases\MySql;
use Spatie\DbDumper\Compressors\GzipCompressor;
use Spatie\DbDumper\Exceptions\CannotStartDump;
use Spatie\DbDumper\Exceptions\CannotSetParameter;
use Schickling\Backup\Databases\MySQLDatabase;
use Schickling\Backup\Commands\RestoreCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Artisan;
use Exception;
use Backup;
use Log;
use Carbon;
use Response;
use Storage;

use Mockery as m;

use DB;
use PDF;

use App\File;

use Illuminate\Support\Facades\HtmlBuilder;
use Symfony\Component\HttpFoundation\File\UploadedFile;
UploadedFile::getMaxFilesize();


class RespaldarController extends Controller
{


    protected $console;
        protected $database;

         private $databaseMock='sisol';
    private $tester;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       
        return view('respaldar.index');

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadRequest $request)
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
        //
 
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
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadRequest $request, $id)
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
     
    }

    public function descargarRespaldo()
    {
        $pathToFile = storage_path()."/respaldo/sisol.sql";
        return response()->download($pathToFile);
    }

     public function dump()
    {
        //
         $mytime = Carbon\Carbon::now();


        $databaseName="sisol";
        $userName="root";
        $password="123456";
        $pathToFile = storage_path()."/respaldo/sisol ".$mytime->format('d-m-Y H:i:s').".sql";

    $dumpcomand= MySql::create()
    ->setDbName($databaseName)
    ->setUserName($userName)
    ->setPassword($password) 
    ->dumpToFile($pathToFile);

        return response()->download($pathToFile);
       
    }

     public function setUp()
    {
        $this->console = m::mock('Schickling\Backup\Console');
        $this->database = new MySQLDatabase($this->console, 'sisol', 'root', '123456', 'localhost', '3306');
    }
    public function tearDown()
    {
        m::close();
    }

      public function testRestore()
    {

        

        $pathToFile = storage_path()."/respaldo/sisol.sql";

        $this->console->shouldReceive('run')
                      ->with("mysql --user='root' --password='123456' --host='localhost' --port='3306' 'sisol' < 'sisol.sql'")
                      ->once()
                      ->andReturn(true);
        $this->assertTrue($this->database->restore($pathToFile));
    }

    public function testSuccessfulRestore()
    {

        $testDumpFile = storage_path() . '/respaldo/sisol.sql';
        $this->databaseMock->shouldReceive('sisol') 
                           ->with($testDumpFile)
                           ->once()
                           ->andReturn(true);
        $this->tester->execute(array(
            'dump' => 'sisol.sql'
        ));
        $this->assertRegExp("/^(\\033\[[0-9;]*m)*(\\n)*sisol.sql was successfully restored.(\\n)*(\\033\[0m)*$/", $this->tester->getDisplay());
    }

    public function dumping(Request $request)
    {
        //

        

       try {
           $algo= Backup::restore(storage_path()."/respaldo/sisol.sql");
           
        } catch (Exception $e) {
            Response::make($e->getMessage(), 500);
        }
        return redirect()->route('respaldar.index');

        


    }



/*

    public function dumping(Request $request)
    {
        //
        $path=$request->pathfile;
       try {
           $algo= Backup::restore(storage_path().$path);

            
        } catch (Exception $e) {
            Response::make($e->getMessage(), 500);
        }
        return redirect()->route('respaldar.index');
    }


*/


}



