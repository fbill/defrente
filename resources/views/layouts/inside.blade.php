

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') </title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>
    <!-- Plugins CSS -->
    <link href="{{ asset('css/plugins/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<!--Header-->
@include('layouts/header')

<!--Body - section-->

@yield('content')


<!--Footer-->

@include('layouts/footer')



<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="{{ asset('/js/plugins/plugins.js') }}"></script>
<script src="{{ asset('/js/assan.custom.js') }}"></script>


@yield('scripts')
</body>
</html>
