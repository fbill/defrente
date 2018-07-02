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
<div class="cta bg-faded pt10">
    <div class="container">
        <div class="row  hidden-md-down">
            <div class="col-sm-12">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-7 mr-auto ml-auto">
                <div class="row">
                    <div class="col-md-12" align="left">
                        <a href="{{route('inicio')}}"><img src="{{ URL::to('/images/logo-dark.png') }}" height="40"></a>
                    </div>
                    <div class="col-md-12" align="center">
                        <br><br>
                        <h1 class="text-primary">
                            <i class="fa fa-check-circle fa-3x"></i>
                        </h1>

                        <div style="font-size:35px; font-weight:500; line-height:1">
                            @if($email<>"0")
                                <small>Tu compra ha sido exitosa
                                    <br>
                                    <br>
                                    <br>
                                    <div style="font-size:16px; line-height:1.2">En breve recibirás un correo <br>
                                        con tus entradas a: {{$email}}
                                    </div>
                                    <span style="font-size:16px; line-height:1.2;font-weight: bold">Recomendaciones:</span>
                                    <ul style="font-size:16px; line-height:1.2">
                                        <li>Para ingresar al evento puedes llevar la entrada en tu celular o puedes imprimirla tu mismo.</li>
                                        <li>Si la imprimes es necesario que este 100% visible, sin manchas ni desgastes.</li>
                                        <li>Evita mostrar tu entrada a tus amigos. Si alguien copia el código podría usarla por ti.</li>
                                    </ul>
                                </small>

                            @endif

                        </div>

                        <br><br>

                        <a href="{{route('inicio')}}" style="font-size:16px !important">
                            Ver más eventos <i class="fa fa-chevron-right" style="font-size:10px"></i>
                        </a>
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
