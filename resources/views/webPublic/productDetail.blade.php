@extends('layouts.principal')
@section('title','De Frente Event '.$regProduct->fullname)
@section('content')
    <!-- CONTENEDOR DE ELEMENTOS-->
    <div class="cta bg-faded pt-sm-2 pt-md-5 pb50">
        <div class="container">
            <div class="row pt-2 pt-sm-2">
                <div class="col-sm-12">
                </div>
            </div>

            <div class="row pt-sm-2 pt-md-5 ">
                <div class="col-sm-12 col-md-5">

                    <div class="row">
                        <div class="col-md-12 mb10">
                            <div class="events-box clearfix entry-card" style="padding:10px">

                                <div class="">
                                    <div class="" style="display:table; width:100%">
                                        <div style="display:table-row;">
                                            <div class=""
                                                 style="display:table-cell; vertical-align:top; padding-right:10px">
													<span style="font-size:18px; line-height:1">

															<b>
															<a href="{{route('detailEvent',[$regProduct->slug])}}"
                                                               style="color:#333333;">{{$regProduct->fullname}}</a></b>

															<div style="font-size:14px"><b>
                                                                <a href="" data-toggle="modal" data-target="#detalle_evento"><u>Ver Detalle</u>
																</a>
                                                                </b>
															</div>

													</span>
                                            </div>
                                            <div class="align-middle" style="display:table-cell; width:35%"
                                                 align="right">
                                                <div class="image-event float-left popup-container">
                                                    <a href="{{ URL::to($rutaPhotos.$regProduct->medias->random()->fullname) }}"
                                                       class="simple-hover">
                                                        <img class="img-fluid"
                                                             src="{{ URL::to($rutaPhotos.$regProduct->medias->random()->fullname) }}"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" style="display:table-row;">
                                            <div class="pt10 pr10" style="display:table-cell">
                                            </div>
                                            <div class="pt10 pr10" style="display:table-cell">
                                            </div>
                                        </div>
                                        <div class="" style="display:table-row;">
                                            <div class=" border-top pt10 pr10" style="display:table-cell">
                                            </div>
                                            <div class=" border-top pt10 pr10" style="display:table-cell">
                                            </div>
                                        </div>
                                        <div class="" style="display:table-row;">
                                            <div class=""
                                                 style="display:table-cell; vertical-align:top; padding-right:10px	">
													<span style="font-size:18px; line-height:1">
															<span style="font-size:16px">
																<i class="fa fa-map-marker"></i> {{$regProduct->space}}
															</span>
															<div>
																<small>{{$regProduct->address}}</small>
															</div>
													</span>
                                            </div>
                                            <div class="align-middle border-left"
                                                 style="display:table-cell; width:35%; line-height:1; font-size:16px"
                                                 align="CENTER">
                                                {{$regProduct->formatEventDay()}}
                                                <br>
                                                {{date("d ", strtotime($regProduct->date)).$regProduct->formatEventMonth()}}

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div><!--/col-->
                    </div>


                    <div class="row  pb-2">
                        <div class="col-12 col-sm-12">

                            <button type="button" class="btn btn-secondary btn-block bt-mapa hidden-md-up"
                                    onClick="$('#mapa_evento_1').slideToggle()">Ver mapa de Evento <i
                                        class="fa icon-focus ic-mapa"></i></button>

                            <div id="mapa_evento_0" class="hidden-md-down">
                                <img src="{{ URL::to($rutaImages.$regProduct->flat) }}" width="100%">
                            </div>

                            <div id="mapa_evento_1" class="hidden-md-up" style="display:none">
                                <img src="{{ URL::to($rutaImages.$regProduct->flat) }}" width="100%">
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            @if($regProduct->presale==1)
                                <div class="row ">
                                    <div class="col-md-12">
                                        <h4 class="" style="line-height:1.1; color:#EB518D">PREVENTA
                                            <br>
                                            <div class="text-dark" style="font-size:16px; font-weight:100">{{$regProduct->text_presale}}
                                            </div>
                                        </h4>

                                    </div>
                                </div>
                            @endif

                            @foreach($regProduct->sectors as $sector)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bs-callout"
                                             style="padding-left:7px; padding-right:10px; border-left-color: {{$sector->color}};">
                                            <div style="display:table; width:100%">
                                                <div style="display:table-row; font-size:15px; font-weight:500; line-height:1.2"
                                                     class="text-dark">
                                                    <div style="display:table-cell; width:42%" class="align-middle">
                                                        @if($regProduct->presale==1)
                                                            PREVENTA Zona <br>
                                                        @endif
                                                        {{$sector->fullname}}
                                                    </div>
                                                    <div style="display:table-cell" class="align-middle"
                                                         align="center">

                                                        @if($regProduct->presale==1)
                                                            @if(count($sector->sector_details)==1)
                                                                S/. {{round($sector->sector_details[0]->price_offer,2)}}
                                                                <br>

                                                            @endif
                                                            <div style="font-size:11px; color:#666666">
                                                                Precio Regular<br>
                                                                @if(count($sector->sector_details)==1)
                                                                    S/. {{round($sector->sector_details[0]->price,2)}}
                                                                    <br>

                                                                @endif
                                                            </div>
                                                        @else
                                                            @if(count($sector->sector_details)==1)
                                                                S/. {{round($sector->sector_details[0]->price,2)}}<br>

                                                            @endif
                                                        @endif

                                                    </div>
                                                    <div style="display:table-cell; padding-left:10px"
                                                         class="align-middle">
                                                        <div class="row ">
                                                            <div class="col-4 text-center  cant-element"
                                                                 style="font-size:20px;">
                                                                <a href="#" id="decrement-{{$sector->id}}" style="color:#999999"><i
                                                                            class="fa fa-minus-circle"></i></a>
                                                            </div>
                                                            <div class="col-4 text-center align-middle">
                                                                  <span id="value-{{$sector->id}}"
                                                                        class="counter-entrdas text-dark">0</span>
                                                            </div>
                                                            <div class="col-4 text-center  cant-element"
                                                                 style="font-size:20px">
                                                                <a href="#" id="increment-{{$sector->id}}" style="color:#999999"><i
                                                                            class="fa fa-plus-circle"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {!! Form::open(['url'=>route('previousBuy'),'id'=>'sendTickets','method'=>'POST'])!!}
                    {!!Form::hidden('valoresId', '', ['id'=>'valoresId'])!!}
                    {!!Form::hidden('product_id', $regProduct->id, ['id'=>'product_id'])!!}
                    <div class="row pt10">
                        <div id="alert"></div>
                        @csrf
                        <div class="col-12 col-md-12 bg-blue">
                            <div class="row price-total " style="padding:20px; padding-top:25px">
                                <div class="col-5 col-md-5 cant-element " align="left">
                                    <a href="{{route('inicio')}}"  class="btn btn-outline-primary mb5 btn-rounded"
                                            style="padding:0px !important; border-width:0px">
                                        <i class="fa fa-chevron-left"></i>ATRÁS
                                    </a>
                                </div>
                                <div class="col-7 col-md-7 cant-element " align="right">
                                    <button type="button" id="verifyPurchase" class="btn btn-white-outline mb5 btn-rounded">
                                        COMPRAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="detalle_evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Más detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $regProduct->more_details !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div><!--modal-->

@endsection
@section('scripts')
    <script>
        var url = "product-zonas.html";
        var valores = [];
        $('.box-cant-other').on('click', function (e) {
            e.preventDefault();
            $('.zone-cant').hide();
            $('.zone-cant-input').css({"visibility": "visible", "display": "block"});
        })

        $('.box-cant-value').on('click', function (e) {
            e.preventDefault();

            $(location).attr('href', url);
        })
        @foreach($regProduct->sectors as $sector)
            $('#value-{{$sector->id}}').text({{$cart[$sector->id]}});
            valores[{{$sector->id}}]={{$cart[$sector->id]}};

            $('#increment-{{$sector->id}}').on('click', function (e) {
                e.preventDefault();
                var total = $('#value-{{$sector->id}}').text();
                total = parseInt(total) + 1;
                $('#value-{{$sector->id}}').text(total);
                valores[{{$sector->id}}]=total;
                //$('#valores_id').val(valores);
            })

            $('#decrement-{{$sector->id}}').on('click', function (e) {
                e.preventDefault();
                var total = $('#value-{{$sector->id}}').text();
                total = parseInt(total) - 1;
                if (total >= 0) {
                    $('#value-{{$sector->id}}').text(total);
                    valores[{{$sector->id}}]=total;
                    //$('#valores_id').val(valores);
                }

            })
        @endforeach
    </script>
    <script>
        $(document).ready(function()
        {
            $("#verifyPurchase").click(function(){
                var valSelect="";var countValores=0; var countCeros=0;
                if (valores.length==0){
                    $('#alert').html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                        "No hay sectores." +
                        "</div>");
                    $('#alert').fadeIn("slow");
                    setTimeout(function() {
                        $("#alert").fadeOut("slow");
                    },2000);
                }else{
                    valores.forEach( function(valor, indice, array) {
                        //console.log("En el índice " + indice + " hay este valor: " + valor);
                        valSelect = valSelect + indice + ":" + valor + "|";
                        countValores = countValores +1;
                        if (valor != 0){

                        }else{
                            countCeros=countCeros +1;
                        }

                    });
                    if (countValores == countCeros){
                        $('#alert').html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                            "Usa los botones + y - para indicar la cantidad de entradas que quieres comprar." +
                            "</div>");
                        $('#alert').fadeIn("slow");
                        setTimeout(function() {
                            $("#alert").fadeOut("slow");
                        },4000);
                    }else{
                        //console.log("Array: " + valSelect);
                        $('#valoresId').val(valSelect);
                        $('#sendTickets').submit();
                    }

                }
            });
        });
    </script>

@endsection