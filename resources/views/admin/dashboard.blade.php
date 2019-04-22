@extends('layouts.layout')

@section('title','DASHBOARD')

@section('APP','SISOL')

@section('content')
@include('layouts.elementos.estadisticas')
@endsection



@section('footer')
@include('layouts.elementos.footer')

@endsection()


@section('js')
<script src="{{asset('assets/assets/javascripts/dashboard/examples.dashboard.js')}}"></script>
<script src="{{asset('assets/assets/javascripts/ui-elements/examples.charts.js')}}"></script>
@endsection