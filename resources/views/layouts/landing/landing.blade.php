<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar GIS</title>
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

    <!-- Website Title -->
    <title>Ayo Cegah Stunting</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="landing/css/bootstrap.css" rel="stylesheet" />
    <link href="landing/css/fontawesome-all.css" rel="stylesheet" />
    <link href="landing/css/swiper.css" rel="stylesheet" />
    <link href="landing/css/magnific-popup.css" rel="stylesheet" />
    <link href="landing/css/styles.css" rel="stylesheet" />

    <!-- Favicon  -->
    <link rel="icon" href="landing/images/favicon.png" />
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

    <!-- Header -->
    <header id="header" class="header">
      <div class="header-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-xl-5">
              <div class="text-container">
                <h1>Ayo Cegah Stunting !</h1>
                <p class="p-large">Lihat sekelilingmu di wilayah kabupaten Pohuwato lokasi Lokus Stunting</p>
                <a class="btn-solid-lg page-scroll" href="/login">Masuk</a>
              </div>
              <!-- end of text-container -->
            </div>
            <!-- end of col -->
            <div class="col-lg-6 col-xl-7">
              <div class="image-container">
                <div class="img-wrapper">
                  <img class="img-fluid" src="landing/images/12.png" alt="alternative" />
                </div>
                <!-- end of img-wrapper -->
              </div>
              <!-- end of image-container -->
            </div>
            <!-- end of col -->
          </div>
          <!-- end of row -->
        </div>
        <!-- end of container -->
      </div>
      <!-- end of header-content -->
    </header>
    <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310">
      <defs>
        <style>
          .cls-1 {
            fill: #5f4def;
          }
        </style>
      </defs>
      <title>header-frame</title>
      <path
        class="cls-1"
        d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"
      />
    </svg>
    <!-- end of header -->

    <!-- Customers -->
    <div class="slider-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- Image Slider -->
            <div class="slider-container">
              <div class="swiper-container image-slider">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img class="img-fluid" src="landing/images/customer-logo-1.png" alt="alternative" />
                  </div>
                  <div class="swiper-slide">
                    <img class="img-fluid" src="landing/images/customer-logo-2.png" alt="alternative" />
                  </div>
                  <div class="swiper-slide">
                    <img class="img-fluid" src="landing/images/customer-logo-3.png" alt="alternative" />
                  </div>
                  <div class="swiper-slide">
                    <img class="img-fluid" src="landing/images/customer-logo-4.png" alt="alternative" />
                  </div>
                  <div class="swiper-slide">
                    <img class="img-fluid" src="landing/images/customer-logo-5.png" alt="alternative" />
                  </div>
                  <div class="swiper-slide">
                    <img class="img-fluid" src="landing/images/customer-logo-6.png" alt="alternative" />
                  </div>
                </div>
                <!-- end of swiper-wrapper -->
              </div>
              <!-- end of swiper container -->
            </div>
            <!-- end of slider-container -->
            <!-- end of image slider -->
          </div>
          <!-- end of col -->
        </div>
        <!-- end of row -->
      </div>
      <!-- end of container -->
    </div>
    <!-- end of slider-1 -->
    <!-- end of customers -->



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
    <!-- Custom scripts -->
  </body>
</html>
