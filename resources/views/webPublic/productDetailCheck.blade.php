<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#005CA9" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DeFrente Check </title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>
    <!-- Plugins CSS -->
    <link href="{{ asset('css/plugins/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--<script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/787DD21B-9D95-9541-B0D3-52E16C0814F6/main.js" charset="UTF-8"></script>--}}
    <script src="https://checkout.culqi.com/js/v3"></script>
    <style>
        .fadebox {
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=80);
        }
        .overbox {
            display: none;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 30%;
            z-index:1002;
            overflow: auto;
        }
    </style>
</head>

<body>
<div id="preloader">
    <div id="preloader-inner"></div>
</div><!--/preloader-->

<!-- Site Overlay -->
<div class="site-overlay"></div>
<!-- FIN HEADER -->

<div id="over" class="overbox">
    <div class="row">
        <div class="col-md-12 pb20" align="center">

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Procesando pago</h5>
                    <p class="card-text">Un Momento por favor...</p>
                    <div id="load"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="fade" class="fadebox">&nbsp;</div>
{{--<p><a href="javascript:showLightbox();">Show LightBox</a></p>--}}
<!-- CONTENEDOR DE ELEMENTOS-->
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
<div class="cta bg-faded pt10">
    <div class="container">
        <div class="row hidden-md-down">
            <div class="col-sm-12">
            </div>
        </div>

        <div class="row ml-auto mr-auto">
            <div class="col-sm-12 col-md-7 ml-auto mr-auto">
                <div class="row">

                    <div class="col-md-12">
                        <div class="row pt10 pb10">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-xs"
                                        style="border-radius: 50%; margin-right:10px">1
                                </button>
                                <span style="font-size:18px; font-weight:500"> Revisa el detalle de tu compra </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 entry-card border">
                        <div class="col-12">
                            <div class="row" style="line-height:1.2;">
                                <div class="align-middle text-dark pt10" align="center" style="display:table; width:100%; font-size:15px; font-weight:500">
                                    <div style="display:table-row">
                                        <div style="display:table-cell;"
                                             class="align-middle pt10 pb10 border-bottom" align="left">
                                            <b>Zona</b>
                                        </div>
                                        <div style="display:table-cell;" class="align-middle pt10 pb10  border-bottom" align="center">
                                            <b>Precio</b>
                                        </div>
                                        <div style="display:table-cell;" class="align-middle pt10 pb10 border-bottom" align="center">
                                            <b>Cantidad</b>
                                        </div>
                                        <div style="display:table-cell;" class="align-middle pt10 pb10  border-bottom" align="right">
                                            <b>Total</b>
                                        </div>

                                    </div>
                                    @foreach($valPreVenta as $preVenta)
                                    <div style="display:table-row">
                                        <div style="display:table-cell;" class="align-middle pt10 pb10" align="left">
                                            {{$preVenta['sector']}}
                                        </div>
                                        <div style="display:table-cell" class="align-middle pt10 pb10 " align="center">
                                            S/ {{round($preVenta['precio'],2)}}
                                        </div>
                                        <div style="display:table-cell;" class="align-middle pt10 pb10"
                                             align="center">
                                            {{$preVenta['cantidad']}}
                                        </div>
                                        <div style="display:table-cell" class="align-middle pt10 pb10 " align="right">
                                            S/ {{round($preVenta['monto'],2)}}
                                        </div>
                                    </div>
                                    @endforeach

                                    <div style="display:table-row">
                                        <div style="display:table-cell; "  class="align-middle pt10 pb10 border-top" align="left">
                                            <b>Total</b>
                                        </div>
                                        <div style="display:table-cell;"  class="align-middle pt10 pb10 border-top" align="center">
                                            <b></b>
                                        </div>
                                        <div style="display:table-cell;"  class="align-middle pt10 pb10 border-top" align="center">
                                            <b>{{$valTotales['num_tickets']}}</b>
                                        </div>
                                        <div style="display:table-cell" class="align-middle pt10 pb10  border-top" align="right">
                                            <b> S/ {{round($valTotales['monto_total'],2)}}</b>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row pt30">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-xs"
                                        style="border-radius: 50%; margin-right:10px">2
                                </button>
                                <span style="font-size:18px; font-weight:500"> Ingresa tus datos </span>
                            </div>
                        </div>
                        <div class="row pt10 ">
                            <div class="col-lg-1 pb10 hidden-md-down">

                            </div>
                            <div class="col-lg-5 col-10 ml-auto mr-auto" style="padding-bottom:5px">
                                <input type="tel" name="dni" id="dni" class="form-control" placeholder="DNI"
                                       style="text-align:center">
                            </div>
                            <div class="col-lg-5 col-10 ml-auto mr-auto pb10">
                                <input type="tel" name="celular" id="celular" class="form-control" placeholder="Celular"
                                       style="text-align:center">
                            </div>
                            <div class="col-lg-1 pb10 hidden-md-down">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-10" align="center">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Correo" style="text-align:center">

                                <span class="text-dark" style="font-size:12px; font-weight:400">
										Enviaremos tus entradas a este correo
										</span>
                                <div id="xmail" class="hide"><h6 class="text-danger">Ingresa un email valido</h6></div>
                            </div>
                            <div class="col-1">
                            </div>
                        </div>


                        <div class="row pt20">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-xs"
                                        style="border-radius: 50%; margin-right:10px">3
                                </button>
                                <span style="font-size:18px; font-weight:500"> Selecciona tu método de pago</span>


                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12" align="center">
                                <div style="display:table" class="">
                                    <div style="display:table-row">
                                        <div style="display:table-cell; padding-right:10px" class="align-middle">
                                            <input type="radio" name="metodo" id="metodo" style="width:20px; height:20px;"
                                                   checked="checked">
                                        </div>
                                        <div style="display:table-cell; padding-right:3px" class="align-bottom">
                                            <i class="fa fa-credit-card fa-2x"></i>
                                        </div>
                                        <div style="display:table-cell; padding-right:10px; font-size:14px; line-height:1; color:#000000"
                                             class="align-middle" align="left">
                                            Pago con<br>
                                            tarjeta
                                        </div>

                                        {{--<div style="display:table-cell; padding-right:10px" class="align-middle">
                                            <input type="radio" name="metodo" style="width:20px; height:20px;">
                                        </div>
                                        <div style="display:table-cell; padding-right:10px" class="align-middle">
                                            <img src="{{ URL::to('/images/logo_pe.png') }}" height="32">
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt20">
                                <div id="alert"></div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 pt40" align="center">
                                Al confirmar aceptas los <b><u><a href="" data-toggle="modal" data-target="#terminos" class="text-dark">términos y condiciones</a></u></b>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt20">

                    <div class="col-12 col-md-12 bg-blue" id="botones">
                        <div class="row price-total " style="padding:20px; padding-top:25px">
                            <div class="col-5 col-md-5 cant-element " align="left">
                                <a href="{{route('detailEvent',[$objProduct->slug])}}"  class="btn btn-outline-primary mb5 btn-rounded"
                                        style="padding:0px !important; border-width:0px">
                                    <i class="fa fa-chevron-left"></i>ATRÁS
                                </a>
                            </div>
                            <div class="col-7 col-md-7 cant-element " align="right">
                                <button type="button" class="btn btn-white-outline mb5 btn-rounded" id="buyButton"
                                        role="button">
                                    CONFIRMAR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visible-print text-center">

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$objInfo->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                {!! $objInfo->content !!}



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div><!--modal-->



<!--back to top-->
<a href="#" class="back-to-top hidden-xs-down" id="back-to-top"><i class="ti-angle-up"></i></a>
<!-- jQuery first, then Tether, then Bootstrap JS. -->

<script src="{{ asset('/js/plugins/plugins.js') }}"></script>
<script src="{{ asset('/js/assan.custom.js') }}"></script>
<script src="{{ asset('/js/javascript.js') }}"></script>

<script>
    var url = "product-zonas.html";
    $('.box-cant-other').on('click',function (e) {
        e.preventDefault();
        $('.zone-cant').hide();
        $('.zone-cant-input').css({"visibility":"visible","display":"block"});
    })

    $('.box-cant-value').on('click',function (e) {
        e.preventDefault();

        $(location).attr('href',url);
    })

    $('#increment-1').on('click',function (e) {
        e.preventDefault();
        var total = $('#value-1').text();
        total = parseInt(total) + 1;
        $('#value-1').text(total);
    })

    $('#decrement-1').on('click',function (e) {
        e.preventDefault();
        var total = $('#value-1').text();
        total = parseInt(total) - 1;
        if(total >= 0){
            $('#value-1').text(total);
        }

    })

    $('#increment-2').on('click',function (e) {
        e.preventDefault();
        var total = $('#value-2').text();
        total = parseInt(total) + 1;
        $('#value-2').text(total);
    })

    $('#decrement-2').on('click',function (e) {
        e.preventDefault();
        var total = $('#value-2').text();
        total = parseInt(total) - 1;
        if(total >= 0){
            $('#value-2').text(total);
        }

    })

    $('#increment-3').on('click',function (e) {
        e.preventDefault();
        var total = $('#value-3').text();
        total = parseInt(total) + 1;
        $('#value-3').text(total);
    })

    $('#decrement-3').on('click',function (e) {
        e.preventDefault();
        var total = $('#value-3').text();
        total = parseInt(total) - 1;
        if(total >= 0){
            $('#value-3').text(total);
        }

    })


</script>

<script>
    function showLightbox() {
        document.getElementById('over').style.display='block';
        document.getElementById('fade').style.display='block';
    }
    function hideLightbox() {
        document.getElementById('over').style.display='none';
        document.getElementById('fade').style.display='none';
    }
</script>
<!-- Incluyendo .js de Culqi Checkout https://checkout.culqi.com/js/v3-->


<!-- Seteando valores de config-->
<script>
    Culqi.publicKey = 'pk_test_weMWDeNuro39xtHZ'; // Colocar tu C�digo de Comercio (llave p�blica)
    Culqi.settings({
        title: 'Paga tu compra',
        currency: 'PEN', // C�digo de la moneda, 'PEN' o 'USD'
        description: '{{$objProduct->fullname}}', // Descripci�n acerca de la compra
        amount: {{$valTotales['monto_total']*100}} // Monto de la compra (sin punto decimal, en este caso 35.00 soles)
    });
</script>
<script>
    jQuery(document).ready(function() {
        $("#xmail").hide();
        jQuery('#dni').keypress(function(tecla) {
            if(tecla.charCode < 48 || tecla.charCode > 57) return false;
        });
        jQuery('#celular').keypress(function(tecla) {
            if(tecla.charCode < 48 || tecla.charCode > 57) return false;
        });
    });
</script>
<script>
    function caracteresCorreoValido(email, div){
        console.log(email);
        //var email = $(email).val();
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

        if (caract.test(email) == false){
            //$(div).hide().removeClass('hide').slideDown('fast');
            $(div).show("slow");

            return false;
        }else{
            //$(div).hide().addClass('hide').slideDown('slow');
            $(div).hide("slow");
//        $(div).html('');
            return true;
        }
    }
</script>
<script>
    // cuando pierde el foco, este valida si lo que esta en el campo de texto si es un correo o no y muestra una respuesta
    $('#email').blur(function(){
        caracteresCorreoValido($(this).val(), '#xmail')
    });
</script>

<script>
    $('#buyButton').on('click', function(e) {
        var dniVerif = $('#dni').val().length;
        var celVerif = $('#celular').val().length;
        if ((dniVerif == 8) && (celVerif == 9)){
            var emailVeri = caracteresCorreoValido($('#email').val(), '#xmail');
            if (emailVeri){
                // Abre el formulario con las opciones de Culqi.settings
                Culqi.open();
                e.preventDefault();
            }else{
                $('#alert').html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                    "ERROR: Email no valido." +
                    "</div>");
                $('#alert').fadeIn("slow");
                setTimeout(function() {
                    $("#alert").fadeOut("slow");
                },4000);
            }

        }else{
            $('#alert').html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                "ERROR: Dni debe tener 8 y celular 9 caracteres." +
                "</div>");
            $('#alert').fadeIn("slow");
            setTimeout(function() {
                $("#alert").fadeOut("slow");
            },4000);
        }

    });
    // Recibimos el token desde los servidores de Culqi
    function culqi() {
        if (Culqi.token) { // Token creado exitosamente!
            // Obtener el token ID
            var token = Culqi.token.id;
            var url_base ="{{ asset('/') }}";
            var dni = $("#dni").val();
            var celular = $("#celular").val();
            var email = $("#email").val();
            var metodo = $("#metodo").val();
            var sectores ="";
            var divLoading = 'load';
            var loading= "<div class='" + divLoading +"'><img src='" + url_base +  "images/loading.gif" + "' ></div>";

            @foreach($valPreVenta as $preVenta)
                sectores = sectores + {{$preVenta['sector_id']}} + ":" + {{$preVenta['precio']}} + ":" + {{$preVenta['cantidad']}} + "|";
            @endforeach
            showLightbox();
            $("#"+divLoading).html(loading);
            $("#botones").hide("slow");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post("{{route('purchasedComplete')}}", // Ruta hacia donde enviaremos el token vía POST
                {token: Culqi.token.id, product_id:{{$objProduct->id}},val_pre_venta:sectores,monto_total:{{$valTotales['monto_total']*100}},dni: dni, celular: celular, email: email},
                function(data, status){
                    console.log (data.toString());
                }).done(function(data) {
                    data=JSON.parse(data); //convertir data json a objeto js

                    if(data.object=="charge"){
                        var url = "{{route('endProcess')}}";
                        $(location).attr('href',url);
                        //alert("Cargo realizado exitosamente");
                    }else{
                        console.log(data);
                        alert(data.mensaje_usuario);
                    }
                })
                .fail(function() {
                    $("#botones").show("slow");
                    $("#"+divLoading).html("<div class='" + divLoading +"'>Problemas</div>");
                })
                .always(function() {
                    $("#botones").hide("slow");
                    $("."+divLoading + " > img ").hide();
                });

        } else { // Hubo algun problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.mensaje);
        }
    };
</script>
</body>
</html>
