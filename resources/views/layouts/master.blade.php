<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ayo Cegah Stunting</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('../assets/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{ asset('../assets/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{ asset('../assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('../assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    {{-- <link href="{{ asset('./assets/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet"> --}}
    <link href="{{ asset('../assets/css/style.css')}}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/fontawesome.min.css')}}"/> --}}

    

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script> 

    <link rel="stylesheet" href="{{ asset('webmap/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css')}}"/>

    <script type="text/javascript" src="{{ asset('webmap/js/leaflet.ajax.js')}}"></script>


         <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     
        <style>
            #map { height: 400px; }

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

</head>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<body>
    


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{ asset('../assets/images/logo.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('./assets/images/logo-compact.png')}}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('../assets/images/Logo Dashboard.png')}}" width="90%" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.sidebar')
        
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('../assets/plugins/common/common.min.js')}}"></script>
    <script src="{{ asset('../assets/js/custom.min.js')}}"></script>
    <script src="{{ asset('../assets/js/settings.js')}}"></script>
    <script src="{{ asset('../assets/js/gleek.js')}}"></script>
    <script src="{{ asset('../assets/js/styleSwitcher.js')}}"></script>

    {{-- <script src="{{ asset('./assets/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('./assets/plugins/sweetalert/js/sweetalert.init.js')}}"></script> --}}

    <!-- Chartjs -->
    <script src="{{ asset('../assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('../assets/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{ asset('../assets/plugins/d3v3/index.js')}}"></script>
    <script src="{{ asset('../assets/plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{ asset('../assets/plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('../assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('../assets/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('../assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('../assets/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('../assets/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{ asset('../assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>

    <script src="{{ asset('../assets/plugins/flot/js/jquery.flot.min.js')}}"></script>
    <script src="{{ asset('../assets/plugins/flot/js/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('../assets/plugins/flot/js/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('../assets/plugins/flot/js/jquery.flot.spline.js')}}"></script>
    <script src=".{{ asset('./assets/plugins/flot/js/jquery.flot.init.js')}}"></script>

    <script src="{{ asset('../assets/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('../assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('../assets/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>

    {{-- <script src="{{ asset('../assets/leaflet-control-window/src/L.Control.Window.js')}}"></script>  --}}

    @stack('scripts')
    @stack('update')
    @stack('kecamatan')
    @stack('desa')











    <script src="../assets/js/dashboard/dashboard-1.js"></script>
    

    @section('js')

    @show

</body>

</html>