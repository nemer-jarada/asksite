<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ask Questions</title>

    <!-- css include -->
    <link rel="stylesheet" href="{{ asset('assetsweb/css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsweb/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsweb/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsweb/css/owl.theme.default.min.css') }}">

    <!-- my css include -->
    <link rel="stylesheet" href="{{ asset('assetsweb/css/custom-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsweb/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsweb/css/responsive.css') }}">


</head>


<body>




    <div class="thetop"></div>
    <!-- for back to top -->

    <div class='backToTop'>
        <a href="#" class='scroll'>
            <span>T</span>
            <span>O</span>
            <span>P</span>
            <span class="go-up">
                <i class="icofont icofont-long-arrow-up"></i>
            </span>
        </a>
    </div>
    <!-- backToTop -->




    <!-- ==================== header-section Start ==================== -->
    <header id="header-section" class="header-section w100dt navbar-fixed">

        <nav class="nav-extended main-nav">
            <div class="container">
                <div class="row">
                    <div class="nav-wrapper w100dt">

                        <div class="logo left">
                            <a href="{{ route('index') }}" class="brand-logo">
                                <img src="{{ asset('assetsweb/img/logo.png') }}" alt="brand-logo">
                            </a>
                        </div>
                        <!-- logo -->

                        <div>
                            <a href="#" data-activates="mobile-demo" class="button-collapse">
                                <i class="icofont icofont-navigation-menu"></i>
                            </a>
                            <ul id="nav-mobile" class="main-menu center-align hide-on-med-and-down">
                                <li class="{{ request()->routeIs('index') ? 'active' : '' }}"><a href="{{ route('index') }}">الرئيسية</a></li>
                                <li class="{{ request()->routeIs('articals') ? 'active' : '' }}"><a href="{{ route('articals') }}">المقالات</a></li>

                                <li  class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">اتصل بنا</a></li>
                            </ul>
                            <!-- /.main-menu -->

                            <!-- ******************** sidebar-menu ******************** -->
                            <ul class="side-nav" id="mobile-demo">
                                <li class="snavlogo center-align"><img src="{{ asset('assetsweb/img/logo.png') }}"
                                        alt="logo"></li>
                                <li class="active"><a href="{{ route('index') }}">الرئيسية</a></li>
                                <li><a href="{{ route('articals') }}">المقالات</a></li>
                                <li><a href="single-blog.html">SINGLE BLOG</a></li>
                                <li><a href="contact.html">CONTACT</a></li>
                                <li><a href="404.html">404 PAGE</a></li>
                            </ul>
                        </div>
                        <!-- main-menu -->

                        <a href="#" class="search-trigger right">
                            <i class="icofont icofont-search"></i>
                        </a>
                        <!-- search -->
                        <div id="myNav" class="overlay">
                            <a href="javascript:void(0)" class="closebtn">&times;</a>
                            <div class="overlay-content">
                                <form>
                                    <input type="text" name="search" placeholder="Search...">
                                    <br>
                                    <button class="waves-effect waves-light" type="submit"
                                        name="action">Search</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.nav-wrapper -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </nav>

    </header>
    <!-- /#header-section -->
    <!-- ==================== header-section End ==================== -->





    @yield('content')




    <!-- ==================== footer-section Start ==================== -->
    <footer id="footer-section" class="footer-section w100dt">
        <div class="container">

            <div class="footer-logo w100dt center-align mb-30">
                <a href="{{ route('index') }}" class="brand-logo">
                    <img src="{{ asset('assetsweb/img/logo.png') }}" alt="brand-logo">
                </a>
            </div>
            <!-- /.footer-logo -->

            <ul class="footer-social-links w100dt center-align mb-30">
                <li><a href="https://www.facebook.com/nemermj/" target="_blank" class="facebook">FACEBOOK</a></li>
                <li><a href="https://twitter.com/NJarada" target="_blank" class="twitter">TWITTER</a></li>
                <li><a href="https://www.instagram.com/nemer_jaradh/"  target="_blank" class="instagram">INSTAGRAM</a></li>
            </ul>

            <p class="center-align">
                Made with <i class="icofont icofont-heart-alt l-red"></i> by
                <a class="N-blue">TIGER MJ</a>
            </p>

        </div>
        <!-- container -->
    </footer>
    <!-- /#footer-section -->
    <!-- ==================== footer-section End ==================== -->




    <!-- my custom js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- my custom js -->
    <script src="{{ asset('assetsweb/js/custom.js') }}"></script>



</body>

</html>
