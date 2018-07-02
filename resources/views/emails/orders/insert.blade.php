<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
    .borde_inf {
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: #E1E1E1;
    }
    .borde{
        border-width: 1px;
        border-style: solid;
        border-color: #E1E1E1;
        padding:7px;
    }
    .borde2{
        border-width: 1px;
        border-style: solid;
        border-color: #005CA9;
        padding:0px;
    }
    .borde3{
        border-left-width: 1px;
        border-left-style: dashed;
        border-ñeft-color: #E1E1E1;
        padding-left:10px;
        padding-right:10px
    }
    body{font-family:Verdana, Arial}

    .fuentes{font-family:Verdana, Arial, Helvetica, sans-serif;}

    .texto1{
        font-family:Verdana, Arial, Helvetica, sans-serif;
        font-size:22px;
        font-weight:bold;
    }

    .texto2{
        font-family:Verdana, Arial, Helvetica, sans-serif;
        font-size:18px;
        margin-top:10px;
    }

    .texto3{
        color:#005CA9;
        font-weight:700;
    }
</style>
<table width="100%" bgcolor="#005CA9" cellpadding="10">
    <tr>
        <td align="left" valign="middle" >
            <img src="{{ URL::to('/images/logo-light.png') }}" height="25">
        </td>
    </tr>
</table>
<br>

<table width="100%">
    <tr>
        <td align="center" class="texto1">
            ¡Gracias por realizar tu compra con nosotros!
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td align="center" class="texto2">
            Ahora puedes ir a divertirte #defrente
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td align="center">
            <table width="500" cellpadding="5" class="borde">
                <tr>
                    <td class="borde_inf">
                        <b>Zona</b>
                    </td>
                    <td align="center" class="borde_inf">
                        <b>Precio</b>
                    </td>
                    <td align="center" class="borde_inf">
                        <b>Cant.</b>
                    </td>
                    <td align="center" class="borde_inf">
                        <b>Total</b>
                    </td>
                </tr><?php $cant=0;$monto=0;?>
                @foreach($order->orderDetails as $c => $orden)
                    <tr>
                        <td class="borde_inf">
                            {{$orden->sector->fullname}}
                        </td>
                        <td align="center" class="borde_inf">
                            S/ {{$orden->price}}
                        </td>
                        <td align="center" class="borde_inf">
                            {{$orden->quantity}}<?php $cant=$cant+$orden->quantity?>
                        </td>
                        <td align="center" class="borde_inf">
                            S/ {{$orden->amount}}<?php $monto=$monto+$orden->amount?>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>

                    </td>
                    <td align="center">

                    </td>
                    <td align="center">

                    </td>
                    <td align="center">
                        <b>S/ <?php echo $monto ?></b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>


<table width="100%">
    <tr>
        <td align="center" class="texto3">
            TUS ENTRADAS
        </td>
    </tr>
</table>

<br>
<?php $acum=0;$tick=0?>
@foreach($order->orderDetails as $c => $orderDetail)
    <?php $acum = $acum + count($orderDetail->tickets)?>
@endforeach

<?php foreach ($order->orderDetails as $c => $orderDetail){?>
<?php foreach ($orderDetail->tickets as $i=> $ticket){?>
<?php $tick=$tick+1?>
<table width="100%">
    <tr>
        <td align="center">
            <table width="700" cellpadding="5" cellspacing="0" class="borde2">
                <tr bgcolor="#005CA9">
                    <td>
                        &nbsp;&nbsp;<img src="{{ URL::to('/images/logo-light.png') }}" height="25">
                    </td>
                    <td align="right" style="color:#ffffff">
                        Entrada {{$tick}} de {{$acum}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <table width="100%">
                            <tr>
                                <td align="center" width="150" valign="middle">
                                    <b>{{$orderDetail->sector->fullname}}</b><br><br>
                                    <img src="{{$ticket->code_qr}}" width="140">
                                </td>
                                <td width="200" class="borde3">

                                    <table width="100%">
                                        <tr>
                                            <td align="center">
                                                <b>{{$order->product->fullname}}</b>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    {{$order->product->formatEventDay()." ".date("d ", strtotime($order->product->date)).$order->product->formatEventMonth()}}
                                    <br>
                                    Hora: 10:00pm
                                    <br>
                                    Precio: S/ {{$order->price}}
                                    <br><br>
                                    <b>{{$order->product->space}}</b>
                                    {{$order->product->address}}

                                </td>
                                <td>
                                    <img src="{{ URL::to('/media/photos/'.$order->product->medias->random()->fullname) }}" width="320">
                                </td>
                            </tr>
                        </table>
                        <br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php }?>
<?php }?>
<br><br>
<div align="center">
    <img src="http://www.babyhappy.life/defrente/legales.jpg" width="700">
</div>
