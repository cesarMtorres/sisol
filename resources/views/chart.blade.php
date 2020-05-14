@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>

                <hr>
                {!!$pie->html() !!}
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}

{!! $pie->script() !!}

@endsection