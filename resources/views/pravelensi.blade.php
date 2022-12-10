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
                                        {{-- <h5 class="mb-0">Data Pravelensi</h5> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group col-md-12">
                                            <label class="mr-sm-2">Pilih Kecamatan</label>   
                                                <select class="custom-select mr-sm-2" onchange="filter()" id="fkecamatann">
                                                    <option value="all" <?php if($fkecamatan == 'all'): echo 'selected'; endif;?>>Pilih Kecamatan..</option>
                                                    @foreach ($kecamatan as $kec)
                                                        <option value="{{$kec->nama_kecamatan}}" <?php if($fkecamatan == $kec->nama_kecamatan): echo 'selected'; endif;?>>{{$kec->nama_kecamatan}}</option>
                                                    @endforeach
                                                </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="hidden" name="fkecamatan" id="fkecamatan" class="form-control" value="{{$kec->nama_kecamatan}}">
                                        </div>
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



    <div class="ex-basic-1" >
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-xl-5">
                    <label class="mr-sm-2">Download Data</label>
                    <div class="button-icon">
                      <button type="button" class="btn mb-1 btn-rounded btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="btn-icon-left"><i class="fa fa-upload color-success" ></i> </span>Download Data</button>
                   </div>  
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Download Data Sebaran</h5>
                              <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                              </button>
                          </div>
                          <div class="modal-body" >
                              <label class="mr-sm-2">Download Data</label>
                              <div class="button-icon">
                                  <form class="form-inline">
  
                                     <div class="form-group mr-sm-2 mb-3 ml-12">
                                          <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                                      </div>
                                      <div class="form-group mr-sm-2 mb-3 ml-12">
                                          <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                                      </div>
  
                                      {{-- <div class="col-lg-1 col-xl-2">    
                                              <select class="custom-select mr-sm-2 mb-3" id="fperiode">
                                                  @foreach ($periode as $d)
                                                      <option value="{{$d->id_periode}}">{{$d->nama_periode}}</option>
                                                  @endforeach
                                              </select>
                                      </div> --}}
                                      
                                      <div class="col-lg-1 col-xl-2">    
                                          <select class="custom-select mr-sm-2 mb-3 ml-12" id="filterkecamatan">
                                              <option value="">Pilih Kecamatan..</option>
                                              @foreach ($kecamatan as $kec)
                                                  <option value="{{$kec->nama_kecamatan}}">{{$kec->nama_kecamatan}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <div class="input-group mb-3">
                                          <input type="hidden" name="filterkecamatan" id="filterkecamatan" class="form-control" value="{{ $kec->nama_kecamatan}}">
                                      </div>
                                  </form>
                                  <form class="form-inline">
                                      <div class="col-lg-1 col-xl-2"> 
                                          <a href="#" onclick="this.href='/pravelensipertanggal/'+document.getElementById('tglawal').value +    
                                          '/' +document.getElementById('tglakhir').value +                 
                                          '/' +document.getElementById('filterkecamatan').value" target="_blank" class="btn mb-1 btn-rounded btn-warning"><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Pdf</a>           
                                      </div>
  
                                      <div class="col-lg-1 col-xl-2"> 
                                          {{-- <a href="#" onclick="this.href='/inputpravelensiexport/'+document.getElementById('filterkecamatan').value" target="_blank" class="btn mb-1 btn-rounded btn-warning"><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Pdf</a>         --}}
                                          {{-- <a class="btn mb-1 btn-rounded btn-success" href={{ route ('penderitaexport') }}><span class="btn-icon-left"><i class="fa fa-upload color-success" ></i> </span>Excel</a> --}}
                                        <a href="#" onclick="this.href='/gpravelensi/'+document.getElementById('filterkecamatan').value" target="_blank" class="btn mb-1 btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Excel</a>  
                                          
                                      </div>
                                  </form>                                 
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>

                {{-- <div class="col-lg-2 col-xl-4">                            
                    <select class="custom-select mr-sm-1">
                        @foreach ($periode as $d)
                            <option value="{{$d->id_periode}}">{{$d->nama_periode}}</option>
                        @endforeach
                    </select>
                </div> --}}


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
                        data: [@foreach ($lokasi as $d) '{{$d->pravelensi}}',@endforeach],
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
<script>
    function filter(){
        var i = $('#fkecamatann').val();
        window.location.href = i;
    }
</script>