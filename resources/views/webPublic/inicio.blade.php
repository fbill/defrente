@extends('layouts.principal')
@section('title','De Frente Home')
@section('content')
    <div class="container contenedor_owl hidden-md-up">
        <div class="owl-main-slide owl-carousel carousel-dark owl-theme fullscreen">
            @foreach($regsProductSlider as $regProduct)
                <div class="item bg-parallax fullscreen" style='background-image: url("{{ URL::to($rutaPhotos.$regProduct->medias->random()->fullname) }}")'>
                    <div class="d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="text-center">
                                    <h1 class="text-white text-capitalize mb20">
                                        <!-- Build with <strong>modern tools</strong>-->
                                    </h1>
                                    <p class="text-white-gray">
                                        <!--This caption easily change-->
                                    </p>
                                    <!--<a href="#" class="btn btn-white-outline btn-rounded">Learn More</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container contenedor_owl hidden-md-down">
        <div class="owl-main-slide owl-carousel carousel-dark owl-theme fullscreen">
            @foreach($regsProductSlider as $regProduct)
                <div class="item bg-parallax fullscreen" style='background-image: url("{{ URL::to($rutaPhotos.$regProduct->medias->random()->fullname) }}")'>
                    <div class="d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="text-center">
                                    <h1 class="text-white text-capitalize mb20">
                                        <!-- Build with <strong>modern tools</strong>-->
                                    </h1>
                                    <p class="text-white-gray">
                                        <!--This caption easily change-->
                                    </p>
                                    <!--<a href="#" class="btn btn-white-outline btn-rounded">Learn More</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- CONTENEDOR DE ELEMENTOS-->
    <div class="cta bg-faded pt20 pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="font-weight-normal" style="color:#999999">
                        Eventos Destacados
                    </h3>
                </div>
            </div>
            <!--PRODUCTOS -->

            <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb20">
                            <div class="events-box clearfix entry-card">
                                <div class="image-event float-left">
                                    <a href="{{route('detailEvent',[$regsProductSlider[2]->slug])}}">
                                        <img class="img-fluid" src="{{ URL::to($rutaPhotos.$regsProductSlider[0]->medias->random()->fullname) }}" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="events-content float-left clearfix">                                       <div class="" style="display:table; width:100%">
                                        <div style="display:table-row">
                                            <div class="border-right align-middle" style="display:table-cell; vertical-align:top">
													<span style="font-size:18px;  line-height:1">
															<a href="{{route('detailEvent',[$regsProductSlider[0]->slug])}}" style="color:#333333; font-weight:600">{{$regsProductSlider[0]->fullname}}</a>
													</span>
                                            </div>
                                            <div class="align-middle" style="display:table-cell; width:60px; line-height:1.2" align="center">
                                                <p class="mb-0">{{$regsProductSlider[0]->formatDateEvent()}} </p>
                                                <p class="mb-0">{{date("d M", strtotime($regsProductSlider[0]->date))}}</p>
                                            </div>
                                            <div class="align-middle" style="display:table-cell; width:20px" align="right">
                                                <a href="{{route('detailEvent',[$regsProductSlider[0]->slug])}}"> <img class="img-fluid" src="{{ URL::to('/images/logo_0.png') }}" alt="Card image cap"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!--/col-->
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb20">
                            <div class="events-box clearfix entry-card">
                                <div class="image-event float-left">
                                    <a href="{{route('detailEvent',[$regsProductSlider[2]->slug])}}">
                                        <img class="img-fluid" src="{{ URL::to($rutaPhotos.$regsProductSlider[1]->medias->random()->fullname) }}" alt="Card image cap">
                                    </a>

                                </div>
                                <div class="events-content float-left clearfix">
                                    <div class="" style="display:table; width:100%">
                                        <div style="display:table-row">
                                            <div class="border-right align-middle" style="display:table-cell; vertical-align:top">
													<span style="font-size:18px;  line-height:1">
															<a href="{{route('detailEvent',[$regsProductSlider[1]->slug])}}" style="color:#333333; font-weight:600">{{$regsProductSlider[1]->fullname}}</a>
													</span>
                                            </div>
                                            <div class="align-middle" style="display:table-cell; width:60px; line-height:1.2" align="center">
                                                <p class="mb-0">{{$regsProductSlider[1]->formatDateEvent()}} </p>
                                                <p class="mb-0">{{date("d M", strtotime($regsProductSlider[1]->date))}}</p>
                                            </div>
                                            <div class="align-middle" style="display:table-cell; width:20px" align="right">
                                                <a href="{{route('detailEvent',[$regsProductSlider[1]->slug])}}"> <img class="img-fluid" src="{{ URL::to('/images/logo_0.png') }}" alt="Card image cap"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!--/col-->
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb20">
                            <div class="events-box clearfix entry-card">
                                <div class="image-event float-left">
                                    <a href="{{route('detailEvent',[$regsProductSlider[2]->slug])}}">
                                        <img class="img-fluid" src="{{ URL::to($rutaPhotos.$regsProductSlider[2]->medias->random()->fullname) }}" alt="Card image cap">
                                    </a>

                                </div>
                                <div class="events-content float-left clearfix">                                       <div class="" style="display:table; width:100%">
                                        <div style="display:table-row">
                                            <div class="border-right align-middle" style="display:table-cell; vertical-align:top">
													<span style="font-size:18px;  line-height:1">
															<a href="{{route('detailEvent',[$regsProductSlider[2]->slug])}}" style="color:#333333; font-weight:600">{{$regsProductSlider[2]->fullname}}</a>
													</span>
                                            </div>
                                            <div class="align-middle" style="display:table-cell; width:60px; line-height:1.2" align="center">
                                                <p class="mb-0">{{$regsProductSlider[2]->formatDateEvent()}} </p>
                                                <p class="mb-0">{{date("d M", strtotime($regsProductSlider[2]->date))}}</p>
                                            </div>
                                            <div class="align-middle" style="display:table-cell; width:20px" align="right">
                                                <a href="{{route('detailEvent',[$regsProductSlider[2]->slug])}}"> <img class="img-fluid" src="{{ URL::to('/images/logo_0.png') }}" alt="Card image cap"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!--/col-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
