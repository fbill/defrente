<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
</head>
<body>
{{ $header ?? '' }}

{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}

{{ $footer ?? '' }}
</body>
</html>
