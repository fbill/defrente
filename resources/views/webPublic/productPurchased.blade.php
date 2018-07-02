<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#005CA9"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DeFrente Compra realizada </title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>
    <!-- Plugins CSS -->
    <link href="{{ asset('css/plugins/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
<div id="preloader">
    <div id="preloader-inner"></div>
</div><!--/preloader-->

<!-- Site Overlay -->
<div class="site-overlay"></div>

<!-- FIN HEADER -->

<!-- CONTENEDOR DE ELEMENTOS-->
<div class="cta bg-faded">
    <div style="background-color:#005CA9">
        <div class="container">
            <div class="col-sm-12 col-md-7 ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-12 pt10 pb10" align="left">
                        <a href="{{route('inicio')}}"><img src="{{ URL::to('/images/logo-light.png') }}" height="40"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row  hidden-md-down">
            <div class="col-sm-12">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 mr-auto ml-auto">
                <div class="row">
                    <div class="col-md-12" align="center">
                        <br>

                        @if($email<>"0")
                            <div style="font-size:35px; font-weight:500; line-height:1">
                                <small class="text-dark"><b>Tu compra ha sido exitosa</b>
                                    <br>
                                    <br>
                                    <table width="90%">
                                        <tr>
                                            <td width="70">
									<span class="bg-blue social-icon-lg si-dark si-facebook si-dark-round">
										<i class="fa fa-envelope"></i>
										<i class="fa fa-envelope"></i>
									</span>
                                            </td>
                                            <td>
                                                <div style="font-size:16px; line-height:1.2">En breve enviaremos tus
                                                    entradas a: {{$email}}
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </small>
                                <br>
                            </div>
                            <div>
                                <div align="center" style="font-size:18px" class="text-dark pb10">Resumen de compra
                                </div>

                                <!-- RESUMEN DE ENTRADAS -->

                                <div class="col-md-12 entry-card border">

                                    <div class="col-12" style="padding-left:3px; padding-right:20px">

                                        <div class="row" style="line-height:1.2; font-size:18px; font-weight:500">
                                            <div class="align-middle text-dark pt10" align="center"
                                                 style="display:table; width:100%; font-size:15px; font-weight:500">
                                                <div style="display:table-row">
                                                    <div style="display:table-cell"
                                                         class="align-middle pt10 pb10 border-bottom" align="left">
                                                        <b>Zona</b>
                                                    </div>
                                                    <div style="display:table-cell; width:70px"
                                                         class="align-middle pt10 pb10  border-bottom" align="center">
                                                        <b>Precio</b>
                                                    </div>
                                                    <div style="display:table-cell; width:70px"
                                                         class="align-middle pt10 pb10 border-bottom" align="center">
                                                        <b>Cant. </b>
                                                    </div>
                                                    <div style="display:table-cell; width:70px"
                                                         class="align-middle pt10 pb10  border-bottom" align="center">
                                                        <b>Total</b>
                                                    </div>

                                                </div>
                                                @foreach($objOrder->orderDetails as $c => $orderDetail)
                                                <div style="display:table-row">
                                                    <div style="display:table-cell" class="align-middle pt10 pb10"
                                                         align="left">
                                                        {{$orderDetail->sector->fullname}}
                                                    </div>
                                                    <div style="display:table-cell" class="align-middle pt10 pb10 "
                                                         align="right">
                                                        S/ {{round($orderDetail->price*100,2)/100}}
                                                    </div>
                                                    <div style="display:table-cell" class="align-middle pt10 pb10"
                                                         align="center">
                                                        {{$orderDetail->quantity}}
                                                    </div>
                                                    <div style="display:table-cell" class="align-middle pt10 pb10 "
                                                         align="right">
                                                        S/ {{round($orderDetail->amount*100,2)/100}}
                                                    </div>

                                                </div>
                                                @endforeach


                                                <div style="display:table-row">
                                                    <div style="display:table-cell"
                                                         class="align-middle pt10 pb10 border-top" align="left">
                                                        <b>Total</b>
                                                    </div>
                                                    <div style="display:table-cell"
                                                         class="align-middle pt10 pb10  border-top" align="right">
                                                        <b> </b>
                                                    </div>
                                                    <div style="display:table-cell"
                                                         class="align-middle pt10 pb10 border-top" align="center">
                                                        <b>{{$objOrder->orderDetails->sum('quantity')}}</b>
                                                    </div>
                                                    <div style="display:table-cell"
                                                         class="align-middle pt10 pb10  border-top" align="right">
                                                        <b> S/ {{round($objOrder->orderDetails->sum('amount')*100,2)/100}}</b>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- FIN RESUMEN DE ENTRADAS -->

                                <br>

                                <div align="center" style="font-size:18px" class="text-dark pb10">Resumen de entradas
                                </div>
                                <!-- EBTRADA MODELO -->
                                <?php $acum=0;$tick=0?>
                                @foreach($objOrder->orderDetails as $c => $orderDetail)
                                    <?php $acum = $acum + count($orderDetail->tickets)?>
                                @endforeach
                            @foreach($objOrder->orderDetails as $c => $orderDetail)
                                @foreach($orderDetail->tickets as $i => $ticket)
                                    <?php $tick=$tick+1?>
                                        <div class="col-md-12 pt10 pb10">

                                            <div class="card border" style="border-color:#005CA9 !important">
                                                <div class="card-header" style="background-color:#005CA9" align="left">
                                                    <img src="{{ URL::to('/images/logo-light.png') }}" width="80">
                                                    <div class="float-right text-white">Entrada {{$tick}} de {{$acum}}</div>
                                                </div>
                                                <div class="card-body" style="padding:3px">
                                                    <div class="" style="display:table; width:100%">
                                                        <div class="" style="display:table-row">
                                                            <div class="" align="left"
                                                                 style="display:table-cell; vertical-align:top; width:25%">
															<span style="font-size:18px; line-height:1">
                                                                    <img src="{{$ticket->code_qr}}" width="100%">
															</span>
                                                            </div>
                                                            <div align="left" class="align-middle "
                                                                 style="display:table-cell; width:35%; line-height:1.2; padding-left:0px; padding-right:10px; padding-bottom:10px"
                                                                 align="CENTER">
                                                                <h4>{{$objOrder->product->fullname}}</h4>
                                                                <div style="font-size:15px">{{$orderDetail->sector->fullname}}
                                                                    <br>
                                                                    S/ {{$orderDetail->price}}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card-body border" style="padding-top:5px; padding-bottom:8px">

                                                    <div class="" style="display:table-row;">
                                                        <div class="" align="left"
                                                             style="display:table-cell; vertical-align:top; padding-right:10px	">
														<span style="font-size:18px; line-height:1">
																<span style="font-size:16px"><i
                                                                            class="fa fa-map-marker"></i> {{$objOrder->product->space}}</span>
																<div>
																<small>{{$objOrder->product->address}}</small>
																</div>
														</span>
                                                        </div>
                                                        <div class="align-middle border-left"
                                                             style="display:table-cell; width:35%; line-height:1.2; font-size:16px"
                                                             align="CENTER">
                                                            {{$objOrder->product->formatEventDay()}}
                                                            <br>
                                                            {{date("d ", strtotime($objOrder->product->date)).$objOrder->product->formatEventMonth()}}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                @endforeach



                            @endforeach
                                <!-- FON DE ENTRADA MODELO -->

                                <!-- FON DE ENTRADA MODELO -->
                                <br>
                                <div class="entry-card" style="font-size:16px; width:90%">
                                    <div class="card-header">
                                        Recomendaciones
                                    </div>
                                    <div class="card-body">
                                        <p>
                                        <table>
                                            <tr>
                                                <td valign="top" width="30">
                                                    <i class="fa fa-check"></i>
                                                </td>
                                                <td>
                                                    Para ingresar al evento debes llevar tu entrada en tu celular o
                                                    impresa.
                                                </td>
                                            </tr>
                                        </table>
                                        </p>
                                        <p>
                                            <table>
                                                <tr>
                                                    <td valign="top" width="30">
                                                        <i class="fa fa-check"></i>
                                                    </td>
                                                    <td>
                                                        Si la imprimes asegúrate que el codigo sea legible.
                                                    </td>
                                                </tr>
                                            </table>
                                        </p>
                                        <p>
                                            <table>
                                                <tr>
                                                    <td valign="top" width="30">
                                                        <i class="fa fa-check"></i>
                                                    </td>
                                                    <td>
                                                        Evita mostrar tu entrada. Si alguien le toma una foto podría usarla
                                                        por ti.
                                                    </td>
                                                </tr>
                                            </table>
                                        </p>
                                    </div>
                                </div>


                                <br><br>

                            </div>

                        @endif
                        <a href="{{route('inicio')}}" style="font-size:12px !important" class="btn btn-primary btn-rounded btn-xs">&nbsp;&nbsp;&nbsp;Ver más eventos
                            <i class="fa fa-chevron-right" style="font-size:10px"></i></a>
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--back to top-->
<a href="#" class="back-to-top hidden-xs-down" id="back-to-top"><i class="ti-angle-up"></i></a>
<!-- jQuery first, then Tether, then Bootstrap JS. -->

<script src="{{ asset('/js/plugins/plugins.js') }}"></script>
<script src="{{ asset('/js/assan.custom.js') }}"></script>
<script src="{{ asset('/js/javascript.js') }}"></script>


</body>
</html>
