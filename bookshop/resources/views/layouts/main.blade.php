<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','Sammy Books')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}    " rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }} "rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href=" {{asset('css/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://kit.fontawesome.com/99ac3a6652.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!-- Icons font CSS-->
	{{-- <script src="https://kit.fontawesome.com/99ac3a6652.js" crossorigin="anonymous"></script> --}}
</head><!--/head-->
@section('content')
@endsection
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0392870317</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> lanyentran@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{route('frontend.home')}}"><img src="{{asset('images_del/home/logo.png')}}" alt="" /></a>
                    <p><a href="{{route('frontend.home')}}"><h5>Sammy Books</h2></a></p>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('auth.logout')}}"><i class="fa fa-user"></i>Đăng Xuất</a></li>
                            <li>
                                <a href="">
                                        @if(Auth::check())
                                        Xin chào: {{Auth::user()->email}}
                                        @elseif(Auth::check()==false)
                                       <a href="{{route('user.login')}}">Đăng nhập</a>
                                        @endif
                                </a>
                            </li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                        <li><a href="{{route('cart.showCart')}}"><i class="fa fa-shopping-cart"></i> Cart <span></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu ">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{route('frontend.home')}}" class="active">Trang Chủ</a></li>
                        <li ><a href="{{route('books.product')}}">Sản Phẩm<i class="fa fa-angle"></i></a></li>
                            <li><a href="">Chính sách </a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            <form action="{{route('books.search')}}" method="get">
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="search" placeholder="Search" name="search" class="form-control"/>
                        <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->


<section>
    <div class="container">
        @yield('content')

    </div>

</section>
<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>SM</span>-Sammy Books</h2>
                        <p>Bring knowledge for human</p>
                    </div>
                </div>
                </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            @yield('footer')
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Về Sammy Books</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Categories</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quy định và thanh toán</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Đăng ký nhận tin</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2020 Sammy Books. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="">Yên Trần</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
