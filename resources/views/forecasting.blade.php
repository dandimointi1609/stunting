
@extends('layouts.master')

@section('content')
<div class="content-body">
    

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-1">
                    <div class="card-body">
                    <div class="row">
						<div class="col-sm-4 ">
							<h6 class="alert alert-info">Nilai alpha saat ini adalah :  @foreach ($queryalpha as $f) <b>{{$f->nilai_alpha}}</b>@endforeach</h6>
							{{-- <h6 class="alert alert-info">Nilai alpha saat ini adalah :  {{$querysum}}</h6> --}}

						</div>
						<div class="col-sm-8">
							<form action="forecast.php" method="post" name="ubah_alpha">
								<div class="form-check form-check-inline">
									<input class="form-control" type="text" name="nilai_alpha" placeholder="Ganti Nilai Alpha" style="width:400px;">
									<input type="hidden" name="id_alpha" value="">
									<input class="btn btn-primary" type="submit" name="submit" value="Ganti Alpha" style="margin-left:10px;">
								</div>
							</form>
						</div>
					</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Data Forecasting</h4>
                    {{-- <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/prediksi/create">Tambah Data</a> --}}
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan-Tahun</th>
                                        <th>Data Aktual</th>
                                        <th>Data Perkiraan</th>
                                        <th>Error</th>
                                        <th>Abs Error</th>
                                        <th>Abs Error^2</th>
                                        <th>Abs Error%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                            {{-- <?php
                                    $resultquery = $querysum;
                                    $hasilsum = count($resultquery);
                                    $resultquery = $querytampil;
                                    $d_perkiraan = "";
                                    $count = count($resultquery);
                                    $loop = 0;
                                    $sum_abs_err = 0;
                                    $sum_abs_err2 = 0;
                                    $sum_abs_err_percent = 0;
        
                                    ?>
                                    @foreach ($resultquery as $row)
                                    <?php
								if ($d_perkiraan === "") {
									$d_perkiraan = $hasilsum/$count;
									// $d_perkiraan = 0;
								}
								else {
									// $d_perkiraan = $h_perkiraan;
									$d_perkiraan = 0;
								}

								$array_perkiraan[] = $d_perkiraan;

								$error = $row->d_aktual-$d_perkiraan;
								// $error = 0;


								$abs_err = abs($error);
								$sum_abs_err = $sum_abs_err+$abs_err;

								$abs_err2 = pow($error, 2);
								$sum_abs_err2 = $sum_abs_err2+$abs_err2;

								$abs_err_percent = abs((($row->d_aktual-$d_perkiraan)/$row->d_aktual)*100);
								// $abs_err_percent = 100;
								$sum_abs_err_percent = $sum_abs_err_percent+$abs_err_percent;

                            ?> --}}

                                    @foreach ($querytampil as $item)
                            
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->bln_thn }}</td>
                                        <td>{{ $item->d_aktual}}</td>
                                        <td>{{ $item->bln_thn }}</td>
                                        <td>{{ $item->d_aktual}}</td>
                                        <td>{{ $item->bln_thn }}</td>
                                        <td>{{ $item->d_aktual}}</td>
                                        <td>{{ $item->bln_thn}}</td>
                                    </tr>
                                    @endforeach                                      
                                   
                            </table>
                            
                    </div>

                    {{-- <div class="col-sm-12 ">
                        <h6 class="alert alert-info">Perkiraan untuk periode/bulan berikutnya adalah : <b></b></h6>
                    </div> --}}

                </div>
            </div>

            {{-- <div class="col">
                <div class="card ml-2">
                    <div class="card-body">
                        <p><h5>MAPPE : {{$hasilsum}}</h5></p>
                        <?php $error = 0;?>
                        <p><h5>MAD : {{$error}}</h5></p>
                        <p><h5>MSD : </h5></p>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    

	<script src="{{ asset('js/chart.min.js')}}"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Grafik Peramalan Bulan/Periode Berikutnya</h4>
                        <div class="t">
							<canvas id="speedChart"></canvas>
						</div>
                        <script>

							var speedCanvas = document.getElementById("speedChart");

							Chart.defaults.global.defaultFontFamily = "Times New Roman";
							Chart.defaults.global.defaultFontSize = 15;

							var dataFirst = {
								label: "Aktual",
								data: [@foreach ($querytampil as $bln)  "{{$bln->d_aktual}}", @endforeach],

                                
									lineTension: 0.3,
									fill: false,
									borderColor: '#FFD662',
									backgroundColor: '#FFD662',
									pointBorderColor: '#FFD662',
									pointBackgroundColor: '#FFD662',
									pointRadius: 5,
									pointHoverRadius: 15,
									pointHitRadius: 30,
									pointBorderWidth: 2,
									pointStyle: 'rect'
								};

								var dataSecond = {
									label: "Perkiraan",
									data: [],

										lineTension: 0.3,
										fill: false,
										borderColor: '#007bff',
										backgroundColor: '#007bff',
										pointBorderColor: '#007bff',
										pointBackgroundColor: '#007bff',
										pointRadius: 5,
										pointHoverRadius: 15,
										pointHitRadius: 30,
										pointBorderWidth: 2
									};

									var speedData = {
										labels: [@foreach ($querytampil as $bln)  "{{$bln->bln_thn}}", @endforeach],
										// labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
										datasets: [dataFirst, dataSecond]
										};

										var chartOptions = {
											legend: {
												display: true,
												position: 'top',
												labels: {
													boxWidth: 80,
													fontColor: 'black'
												}
											}
										};

										var lineChart = new Chart(speedCanvas, {
											type: 'line',
											data: speedData,
											options: chartOptions
										});

						</script>
                    </div>
                </div>
            </div>
        </div>
    </div>




















    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-desa').click( function(){
            var kodeprediksi = $(this).attr('data-id')
            var namaprediksi = $(this).attr('data-nama')
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus Data Dengan Nama "+namaprediksi+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete-prediksi/"+kodeprediksi+""
                        swal("Data Berhasil Di Hapus", {
                        icon: "success",
                        });
                    } else {
                        swal("Data Tidak Jadi Di Hapus");
                    }
                });
        });
    </script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success')}}")
        @endif
    </script>

</div>
@endsection
