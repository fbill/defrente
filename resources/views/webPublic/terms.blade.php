@extends('layouts.principal')
@section('title','De Frente Home')
@section('content')

    <div class="container" style="height: 60px">

    </div>
    <!-- CONTENEDOR DE ELEMENTOS-->
    <div class="cta bg-faded pt20 pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <h3>
                        {{$objInfo->title}}
                    </h3>
                </div>
            </div>
            <div class="row">
                {!! $objInfo->content !!}
            </div>

        </div>
    </div>

@endsection
