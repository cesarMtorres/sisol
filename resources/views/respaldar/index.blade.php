 @extends('layouts.layout')

@section('content')
@section('panel_name','Respaldar y Restaurar')
@section('panel_rigth','Respaldar y Restaurar')


<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class="" align="center"><h3>Respaldar</h3></div>
           <a href="{{ action('RespaldarController@dump') }}" class="btn btn-primary" id="btnDescargar" style="padding:4px 10px;">Respaldar</a>
             </div>
 
        </div>

       

        
       
      </div>
      <div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">

       <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class="" align="center"><h3>Restaurar</h3></div>
          <form action="{{ action('RespaldarController@dumping') }}">
            
                        

                                <input name="filenames" type="file" />

                            
                           
           <button type="submit" class="btn btn-primary" id="btnDescargar" style="padding:4px 10px;">Restaurar</button>

           </form>
             </div>
             </div>
             </div>
             </sec>

        </div>

       

        
       
      </div>
      </div>
      <div class="pagination pull-right">
        <li class="page-item"></a></li>
      </div>
    </div>
  </div>
</section>
 

@endsection