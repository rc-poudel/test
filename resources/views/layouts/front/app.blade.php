<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-9325492-23"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env('GOOGLE_ANALYTICS') }}');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Modern e-commerce Project">
    <meta name="tags" content="modern, e-commerce, free, shop, shopping, responsive, fast, software, blade, cart, test driven, storefront">
    <meta name="author" content="RC Poudel">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="manifest" href="{{ asset('favicon.png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}"/>
    @yield('og')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
</head>
<body>
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
<section>
    <div class="row hidden-xs">
        <div class="container">
            <div class="clearfix"></div>
            <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->check())
                        <li><a href="{{ route('accounts') }}"><i class="fa fa-home"></i> My Account</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> Login</a></li>
                        <li><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> Register</a></li>
                    @endif
                    <li id="cart" class="menubar-cart">
                        <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="cart-number">{{ $cartCount }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('forums') }}" title="Forums">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            Forums
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header id="header-section">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-2">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brandu" href="{{ route('home') }}">
                    <img src="{{ asset('logo.png') }}" alt="Logo" width="120" height="50">
                    </a>
                </div>
                <div class="col-md-10">
                    @include('layouts.front.header-cart')
                </div>
            </div>
        </nav>
    </header>
</section>
@yield('content')

@include('layouts.front.footer')

<script src="{{ asset('js/front.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('js')
</body>
</html>