@extends('layouts.principal')
@section('title','De Frente Home')
@section('content')

    <div class="container" style="height: 60px">

    </div>
    <!-- CONTENEDOR DE ELEMENTOS-->
    <div class="cta bg-faded pt20 pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="font-weight-normal" style="color:#999999">
                        Eventos Encontrados
                    </h3>
                </div>
            </div>
            <!--PRODUCTOS -->

            @if (count($regsProductSliders)>0)
                <?php $c=0;?>
                @foreach($regsProductSliders as $y => $regsProductSlider)
                    @if (($c==0) or ($c==3))
                        <div class="row">
                            <?php $c=0;?>
                            @endif
                            <div class="col-lg-4 col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mb20">
                                        <div class="events-box clearfix entry-card">
                                            <div class="image-event float-left">
                                                <a href="{{route('detailEvent',[$regsProductSlider->slug])}}">
                                                    <img class="img-fluid" src="{{ URL::to($rutaPhotos.$regsProductSlider->medias->random()->fullname) }}" alt="Card image cap">
                                                </a>
                                            </div>
                                            <div class="events-content float-left clearfix">
                                                <div class="align-middle" style="display:table; width:100%">
                                                    <div style="display:table-row">
                                                        <div class="border-right" style="display:table-cell; vertical-align:top">
													<span style="font-size:18px;  line-height:1">
															<a href="{{route('detailEvent',[$regsProductSlider->slug])}}" style="color:#333333; font-weight:600">{{$regsProductSlider->fullname}}</a>
													</span>
                                                        </div>
                                                        <div class="align-middle" style="display:table-cell; width:60px; line-height:1.2" align="center">
                                                            <p class="mb-0">{{$regsProductSlider->formatDateEvent()}} </p>
                                                            <p class="mb-0">{{date("d M", strtotime($regsProductSlider->date))}}</p>
                                                        </div>
                                                        <div class="align-middle" style="display:table-cell; width:20px" align="right">
                                                            <a href="{{route('detailEvent',[$regsProductSlider->slug])}}"> <img class="img-fluid" src="{{ URL::to('/images/logo_0.png') }}" alt="Card image cap"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div><!--/col-->
                                </div>
                            </div>
                            <?php $c=$c+1 ?>
                            @if (($c==3) or (count($regsProductSliders)<=$c))
                        </div>
                    @endif
                @endforeach
            @else
                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <span class="alert-info">No se encontraron registros</span>
                    </div>
                </div>

            @endif

        </div>
    </div>

@endsection
