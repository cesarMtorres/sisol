@extends('layouts.layout')
@section('title','Reporte')
@section('panel_name','Reporte')
@section('panel_rigth','Reporte')
@section('content')						
					<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Estadistica</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>

              
                 <hr>

                <div class="panel-heading">Estadistica</div>
                <div class="panel-body">
                {!!$area->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}



{!! $area->script() !!}



@endsection