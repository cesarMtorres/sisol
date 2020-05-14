@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                 {!!$pie->html() !!}
                </div>


          
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}


{!! $pie->script() !!}

@endsection