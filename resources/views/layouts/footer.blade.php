<footer class="footer footer-standard pt20 pb20">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 ">
                <img src="{{ URL::to('/images/logo_inverso.png') }}" height="62">


                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled hidden-md-down">
                            <li>
                                <a href="#" class="text-white">
                                    Categorias
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white">
                                    Calendario
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white">
                                    Mis compras
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white">
                                    Soy organizador
                                </a>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{route('info','terminos')}}" class="text-white">
                                    Terminos y condiciones
                                </a>
                            </li>
                            {{--<li>
                                <a href="#" class="text-white">
                                    Libro de reclamaciones
                                </a>
                            </li>--}}
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 pt20">
                <div class="row">
                    <div class="col-lg-12">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fdefrente.pe%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=315913618945952" width="100%" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>

                    <div class="col-lg-10 hidden-md-down">
                        <form id="widget-subscribe-form" action="{{route('inicio')}}" role="form" method="post" class="mb0">
                            <div class="input-group input-group-lg" style="height:36px;">

                                <input type="email" name="widget-subscribe-form-email" class="form-control required" placeholder="Ingresa tu correo">
                                <span class="input-group-btn">
										<button class="btn btn-primary btn-sm" type="submit">Suscríbete</button>
									</span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt10">

                    <div class="col-sm-6" >
                        <div class="clearfix">
                            <a href="https://www.facebook.com/defrente.pe/" target="_blank" class="social-icon-sm si-dark si-facebook si-dark-round">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://www.facebook.com/defrente.pe/" target="_blank" class="social-icon-sm si-dark si-twitter si-dark-round">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://www.facebook.com/defrente.pe/" target="_blank" class="social-icon-sm si-dark si-instagram si-dark-round">
                                <i class="fa fa-instagram"></i>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<div class="footer-bottomAlt"
     0>
    <div class="container">
        <div class="row">
            <div class="col-md-7">

            </div>
            <div class="col-md-5" align="right">
                <span><b>Pareto</b> &copy; Copyright 2018</span>
            </div>
        </div>
    </div>
</div><!--/footer bottom-->

<!--back to top-->
<a href="#" class="back-to-top hidden-xs-down" id="back-to-top"><i class="ti-angle-up"></i></a>