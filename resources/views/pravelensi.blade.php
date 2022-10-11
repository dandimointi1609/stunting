@extends('layouts.landing.master')

@section('content')
    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Pravelensi Penderita Stunting Di Kabupaten Pohuwato</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>Longer Project Title Should Go Here</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->

    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xl-12">
                     <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-1">
                                    <div class="media-body">
                                        <h5 class="mb-0">Data Pravelensi</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {{-- <div class="col-lg-2 col-xl-4">
                                            <label class="mr-sm-2">Pilih Kecamatan</label>   
                                                <select class="custom-select mr-sm-2" id="kecamatan">
                                                    @foreach ($lokasi as $d)
                                                        <option value="{{$d->kd_kecamatan}}">{{$d->nama_kecamatan}}</option>
                                                    @endforeach
                                                </select>
                                        </div> --}}
                                    </div>
                                </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xl-12">
                     <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-3">
                                    <div class="media-body">
                                        <h5 class="mb-0">Data Pravelensi</h5>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div>
                                            <canvas style="width: 900px; height: 300px" id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
</div>


<script>



// $(document).ready(function() {
    // $('#kecamatan').on('change', function() {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [@foreach ($lokasi as $d) '{{$d->nama_desa }}',@endforeach],
            // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                // data: [12, 19, 3, 23, 2, 3],
                data: [@foreach ($lokasi as $d) '{{$d->total_pendek}}',@endforeach],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
        });

    // });
// });
</script>
@endsection