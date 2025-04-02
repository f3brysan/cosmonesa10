<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cosmonesia | @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Clean Beauty Spa with predefined web elements which helps you to build your own site. These template is suitable for spa, beauty, care, girly, hair, health, beauty parlour, massage, skincare, saloon, make up, physiotherapy, salon, wellness, yoga website. Yoga & Meditation centers, Barbershop, Health & Wellness Centers, Medical, Physiotherapy, Cosmetic Treatment centers, ayurvedic treatments, pedicure, manicure procedures.">
        <meta name="keywords" content="spa, beauty, care, girly, hair, health, beauty parlour, massage, skincare, saloon, make up, physiotherapy, salon, wellness, yoga website. Yoga & Meditation centers, Barbershop, Health & Wellness Centers, Medical, Physiotherapy, Cosmetic Treatment centers, ayurvedic treatments, pedicure, manicure procedures">
        <meta name="author" content="ThemeWar">

        <!-- Start Include All CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/icofont.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/nounicon.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/makeover-icon.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery.datetimepicker.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/lightcase.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/lightslider.css') }}"/>

        <!-- Revolution Slider Setting CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/css/settings.css') }}"/>

        <link rel="stylesheet" href="{{ asset('frontend/css/preset.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/ignore_for_wp.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}"/>
        <!-- End Include All CSS -->

        <!-- Favicon Icon -->
        <link rel="icon"  type="image/png" href="{{ asset('frontend/images/favicon.png') }}">
        <!-- Favicon Icon -->
    </head>
    <body>
        <!-- Preloading -->
        <div class="preloader text-center">
            <div class="la-ball-scale-multiple la-2x">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- Preloading -->

        <!-- Begin:: Header Section -->
        @include("front.partials.header")
        <!-- End:: Header Section -->

        <!-- popup sidebar widget -->
        @yield('body')
        <!-- End:: Blog Section -->

        <!-- Begin:: Footer Section -->
        @include("front.partials.footer")
        <section class="copyright copy_dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>© 2021 <a href="http://themewar.com" target="_blank" rel="noopener">ThemeWar</a> . All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="copy_social">
                            <a target="_blank" href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                            <a target="_blank" href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                            <a target="_blank" href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                            <a target="_blank" href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End:: Footer Section -->

        <!-- Bact To Top -->
        <a href="javascript:void(0);" id="backtotop"><i class="icofont-bubble-up"></i></a>
        <!-- Bact To Top -->

        <!-- Start Include All JS -->
        <script src="{{ asset('frontend/js/jquery.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o"></script>
        <script src="{{ asset('frontend/js/gmaps.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('frontend/js/slick.js') }}"></script>
        <script src="{{ asset('frontend/js/lightcase.js') }}"></script>
        <script src="{{ asset('frontend/js/lightslider.js') }}"></script>
        <script src="{{ asset('frontend/js/tweenmax.min.js') }}"></script>
        <script src="{{ asset('frontend/js/theia-sticky-sidebar.min.js') }}"></script>
        <script src="{{ asset('frontend/js/ResizeSensor.min.js') }}"></script>

        <!-- Slider Revolution Main Files -->
        <script src="{{ asset('frontend/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.themepunch.revolution.min.js') }}"></script>

        <!-- Slider Revolution Extension -->
        <script src="{{ asset('frontend/js/extensions/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.migration.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('frontend/js/extensions/revolution.extension.video.min.js') }}"></script>

        <script src="{{ asset('frontend/js/theme.js') }}"></script>
        <!-- End Include All JS -->
    </body>
</html>
