<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayo Cegah Stunting</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
    <link rel="stylesheet" href="webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users." />
    <meta name="author" content="Inovatik" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" />
    <!-- website name -->
    <meta property="og:site" content="" />
    <!-- website link -->
    <meta property="og:title" content="" />
    <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" />
    <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" />
    <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />
    <link href="assets/css/style.css" rel="stylesheet">


    <!-- Website Title -->
    <title>Ayo Cegah Stunting</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="landing/css/bootstrap.css" rel="stylesheet" />
    <link href="landing/css/fontawesome-all.css" rel="stylesheet" />
    <link href="landing/css/swiper.css" rel="stylesheet" />
    <link href="landing/css/magnific-popup.css" rel="stylesheet" />
    <link href="landing/css/styles.css" rel="stylesheet" />
    <link href="landing/customs/css/style.css" rel="stylesheet">

        <!-- Chartist -->
        <link rel="stylesheet" href="../assets/plugins/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="../assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script> 

    <link rel="stylesheet" href="webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />

    <script type="text/javascript" src="webmap/js/leaflet.ajax.js"></script>


         <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     
        <style>
            #map { height: 350px; width: 1080px; }

            .label-bidang{
                font-size: 6pt;
                color: black;
                opacity: 0.5;
                text-align: center;
            }

            .legend{
                background: white,
                padding:10px;
            }
            {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(255, 26, 104, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(255, 26, 104, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(255, 26, 104, 1);
        background: white;
      }
        </style>


    <!-- Favicon  -->
    <link rel="icon" href="landing/images/favicon.png" />
    <link rel="icon" type="landing/customs/image/png" sizes="16x16" href="images/favicon.png">
  </head>

  <body data-spy="scroll" data-target=".fixed-top">
    <!-- Preloader -->
    <div class="spinner-wrapper">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- end of preloader -->

    <!-- Navigation -->
    @include('layouts.landing.navbar')

    <!-- Features -->
    @yield('content')

    <!-- end of tabs -->
    <!-- end of features -->

    <!-- Pricing -->

    <!-- end of cards-2 -->
    <!-- end of pricing -->


    <!-- Footer -->
    @include('layouts.landing.footer')
  

    <!-- Scripts -->
    <script src="landing/js/jquery.min.js"></script>
    <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="landing/js/popper.min.js"></script>
    <!-- Popper tooltip library for Bootstrap -->
    <script src="landing/js/bootstrap.min.js"></script>
    <!-- Bootstrap framework -->
    <script src="landing/js/jquery.easing.min.js"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="landing/js/swiper.min.js"></script>
    <!-- Swiper for image and text sliders -->
    <script src="landing/js/jquery.magnific-popup.js"></script>
    <!-- Magnific Popup for lightboxes -->
    <script src="landing/js/validator.min.js"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="landing/js/scripts.js"></script>

        <!-- Customs -->
    {{-- <script src="assets/plugins/common/common.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/gleek.js"></script>
    <script src="assets/js/styleSwitcher.js"></script> --}}

    <!--  flot-chart js -->
    <script src="./assets/plugins/flot/js/jquery.flot.min.js"></script>
    <script src="./assets/plugins/flot/js/jquery.flot.pie.js"></script>
    <script src="./assets/plugins/flot/js/jquery.flot.resize.js"></script>
    <script src="./assets/plugins/flot/js/jquery.flot.spline.js"></script>
    <script src="./assets/plugins/flot/js/jquery.flot.init.js"></script>

    <script src="{{url('wilayah.js')}}"></script>


  </body>
</html>
