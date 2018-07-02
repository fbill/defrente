<div id="preloader">
    <div id="preloader-inner"></div>
</div><!--/preloader-->

<!-- Pushy Menu -->
{{--<aside class="pushy pushy-right">
    <div class="cart-content">
        <div class="clearfix">
            <a href="javascript:void(0)" class="pushy-link text-white-gray">Close</a>
        </div>
        <ul class="list-unstyled">
            <li class="clearfix">
                <a href="#" class="float-left">
                    <img src="images/shop/p1.jpg" class="img-fluid" alt="" width="60">
                </a>
                <div class="oHidden">
                    <span class="close"><i class="ti-close"></i></span>
                    <h4><a href="#">Men's Special Watch</a></h4>
                    <p class="text-white-gray"><strong>$299.00</strong> x 1</p>
                </div>
            </li><!--/cart item-->
            <li class="clearfix">
                <a href="#" class="float-left">
                    <img src="images/shop/p2.jpg" class="img-fluid" alt="" width="60">
                </a>
                <div class="oHidden">
                    <span class="close"><i class="ti-close"></i></span>
                    <h4><a href="#">Men's tour beg</a></h4>
                    <p class="text-white-gray"><strong>$99.00</strong> x 1</p>
                </div>
            </li><!--/cart item-->
            <li class="clearfix">
                <a href="#" class="float-left">
                    <img src="images/shop/p3.jpg" class="img-fluid" alt="" width="60">
                </a>
                <div class="oHidden">
                    <span class="close"><i class="ti-close"></i></span>
                    <h4><a href="#">Women's T-shirts</a></h4>
                    <p class="text-white-gray"><strong>$199.00</strong> x 1</p>
                </div>
            </li><!--/cart item-->
            <li class="clearfix">

                <div class="float-right">
                    <a href="#" class="btn btn-primary">Checkout</a>
                </div>
                <h4  class="text-white">
                    <small>Subtotal - </small> $49.99
                </h4>
            </li><!--/cart item-->
        </ul>
    </div>
</aside>--}}
<!-- Site Overlay -->
<div class="site-overlay"></div>

{{--<nav class="navbar navbar-expand-lg navbar-light navbar-transparent bg-faded nav-sticky">
    <div class="search-inline">
        <form>
            <input type="text" class="form-control" placeholder="Type and hit enter...">
            <button type="submit"><i class="ti-search"></i></button>
            <a href="javascript:void(0)" class="search-close"><i class="ti-close"></i></a>
        </form>
    </div>
    <div class="container">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{route('inicio')}}">
            <img class='logo logo-dark' src="images/logo-light.png" alt="">
            <img class='logo logo-light hidden-md-down' src="images/logo-light.png" alt="">
        </a>
        <div  id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link "  href="#">Categorías</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link "  href="#">Calendario</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link "  href="#">Mis entradas</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link "  href="#">Vender entradas</a>
                </li>
            </ul>
        </div>
        <div class=" navbar-right-elements">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="javascript:void(0)" class="search-open"><i class="ti-search"></i></a></li>
                <li class="list-inline-item"><a href="javascript:void(0)" class=" menu-btn"><i class="ti-shopping-cart"></i> <span class="badge badge-default">3</span></a></li>
            </ul>
        </div>
    </div>
</nav>--}}
<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-light navbar-transparent bg-faded nav-sticky">
        <div class="pt20 hidden-md-down"></div>
        <div class="container" align="left">
            <div class="row">
                <a class="" href="" style="margin-left:10px; margin-top:7px; margin-right:10px" onClick="return false" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-white fa-2x"></i>
                </a>
                <a class="" href="{{route('inicio')}}">
                    <img class="" src="{{ URL::to('/images/logo-light.png') }}" height="40" alt="">
                </a>
            </div>
            <div class="section-hero hidden-md-down" style="width:50%">
                {!! Form::open(['url'=>route('searchEvents'),'id'=>'searchEvents','method'=>'GET','class'=>'defrente-margin-medium-top defrente-margin-xlarge-bottom defrente-search defrente-search-default','style'=>'width:100%'])!!}

                    <a href="" class="defrente-search-icon-flip defrente-search-icon defrente-icon" defrente-search-icon="" id="searchButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" ratio="1">
                            <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle>
                            <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"></path>
                        </svg></a>
                    <input id="textSearch" class="defrente-search-input defrente-form-large" type="search" autocomplete="on" name="textSearch" placeholder="Buscar eventos...">

                {!! Form::close() !!}
            </div>
            {{--<div>
                <a href="" class="btn btn-white-outline btn-rounded btn-xs hidden-lg-down" style="margin-right:5px; border-width:1px">
                    MIS COMPRAS
                </a>
                <a href="" class="btn btn-white-outline btn-rounded btn-xs" style="background:#EB518D; border-width:1px">
                    CREAR EVENTO
                </a>
            </div>--}}
            <div  id="navbarNavDropdown" class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link "  href="#">Categorías</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link "  href="#">Calendario</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link "  href="#">Mis compras</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link "  href="#">Soy organizador</a>
                    </li>
                </ul>
            </div>
            {{--<div class=" navbar-right-elements">
            <ul class="list-inline">
            <li class="list-inline-item"><a href="javascript:void(0)" class="search-open"><i class="ti-search"></i></a></li>
            <li class="list-inline-item"><a href="javascript:void(0)" class=" menu-btn"><i class="ti-shopping-cart"></i> <span class="badge badge-default">3</span></a></li>
            </ul>
            </div>--}}
            <!--right nav icons-->
        </div>
        <div class="container ">
            <div class="col-12 text-center pt-2 pb-2 pl-0 pr-0">
                <div class="section-hero hidden-md-up">
                    {!! Form::open(['url'=>route('searchEvents'),'id'=>'searchEvents1','method'=>'GET','class'=>'defrente-margin-medium-top defrente-margin-xlarge-bottom defrente-search defrente-search-default'])!!}

                    <a href="" class="defrente-search-icon-flip defrente-search-icon defrente-icon" defrente-search-icon="" id="searchButton1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" ratio="1">
                            <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle>
                            <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"></path>
                        </svg></a>
                    <input id="textSearch" class="defrente-search-input defrente-form-large" type="search" autocomplete="on" name="textSearch" placeholder="Buscar eventos...">

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </nav>
</div>


