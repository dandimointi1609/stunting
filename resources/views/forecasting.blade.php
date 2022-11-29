
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
						<div class="col-sm-8">
							<center><h5 class="alert alert-info">Nilai alpha saat ini adalah :  @foreach ($forecasting as $f) <b>{{$f->nilai_alpha}}</b></h5></center>
						</div>
						<div class="col-sm-2">
							<form name="ubah_alpha">
								<div class="form-check form-check-inline">
                                    <a href="{{url('ubahalpha',$f->id_alpha)}}"  class="btn mb-1 btn-outline-primary"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Ganti Alpha</a>
                                    @endforeach
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
            <div class="col-sm-9">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">Data Forecasting</h4>
                    {{-- <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/prediksi/create">Tambah Data</a> --}}
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        {{-- <th>No</th> --}}
                                        <th>Bulan-Tahun</th>
                                        {{-- <th>Data Aktual</th> --}}
                                        <th>Data Perkiraan</th>
                                        <th>Error</th>
                                        <th>Abs Error</th>
                                        <th>Abs Error^2</th>
                                        <th>Abs Error%</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    


        foreach($resultquery as $row)

        {
            if($d_perkiraan === ""){
                $d_perkiraan = $hasilsum[0]->sum/$count;
            }
            else{
				$d_perkiraan = $h_perkiraan;

            }
				$array_perkiraan[] = $d_perkiraan;

        	//rumus error
            $error = $row->d_aktual-$d_perkiraan;


			//rumus absolute error
			$abs_err = abs($error);
			$sum_abs_err = $sum_abs_err+$abs_err;


            //rumus absolute error pangkat 2
			$abs_err2 = pow($error, 2);
			$sum_abs_err2 = $sum_abs_err2+$abs_err2;

            //rumus absolute error %
			$abs_err_percent = abs((($row->d_aktual-$d_perkiraan)/$row->d_aktual)*100);
			$sum_abs_err_percent = $sum_abs_err_percent+$abs_err_percent;

                                echo "<tr>";
								// <td>"$loop->itaration"</td>
								// echo "<td></td>
								echo "<td>$row->bln_thn</td>
								<td>".number_format($d_perkiraan,3)."</td>
								<td>".number_format($error,3)."</td>
								<td>".number_format($abs_err,3)."</td>
								<td>".number_format($abs_err2,3)."</td>
								<td>".number_format($abs_err_percent,3)."%</td>";
								echo "</tr>";


            //rumus single exponential smoothing
			$h_perkiraan = $d_perkiraan+$n_alpha[0]->nilai_alpha*($row->d_aktual-$d_perkiraan);

            $loop = $loop+1;
            if($loop == $count){
                $d_aktual_next = $row->d_aktual;
                $d_perkiraan_next = $d_perkiraan;
                $d_ft = $d_perkiraan_next+$n_alpha[0]->nilai_alpha*($d_aktual_next-$d_perkiraan_next);


//rumus MAPE
                $rata_abs_error_percent = $sum_abs_err_percent/$count;

//rumus rata2 abs_err MAD
                $rataabs_err = $sum_abs_err/$count;

//rumus rata2 abs_err2 MSD
                $rataabs_err2 = $sum_abs_err2/$count;


            }

        }
                                        
                                    ?>
                                   
                            </table>
                            
                    </div>

                    <div class="col-sm-12 ">
                        {{-- <h6 class="alert alert-info">Perkiraan untuk periode/bulan berikutnya adalah : {{$perkiraan2}} <b></b></h6> --}}
                        <h6 class="alert alert-info">Perkiraan untuk periode/bulan berikutnya adalah : <?php echo number_format($d_ft,3);?> <b></b></h6>
                    </div>

                </div>
            </div>

            <div class="col">
                <div class="card ml-2">
                    <div class="card-body">
                        <p><h5>MAPPE : <?php echo number_format($rata_abs_error_percent,3);?></h5></p>
                        {{-- <p><h5>MAPPE : {{$mappe}}</h5></p> --}}
                        <p><h5>MAD : <?php echo number_format($rataabs_err,3);?></h5></p>
                        {{-- <p><h5>MAD : {{$mad}}</h5></p> --}}
                        <p><h5>MSD : <?php echo number_format($rataabs_err2,3);?></h5></p>
                        {{-- <p><h5>MSD : {{$mse}}</h5></p> --}}
                    </div>
                </div>
            </div>

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
                                data: [@foreach ($querydaktual as $bln)  "{{$bln->d_aktual}}", @endforeach],
                                // data: [<?php
                                        
                                //         foreach ($querydaktual as $data_aktual) {
                                //             echo "$data_aktual->d_aktual, ";
                                //         }
                                //     ?>]

                                
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
                                    data: [<?php
										foreach ($array_perkiraan as $arper) {
											echo "".$arper.", ";
										}
										echo "".$d_ft."";
										?>],

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
                                        labels: [<?php

											If(!$querybulan){
												die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
											}

											foreach ($querybulan as $data_bulan) {
												echo "\"$data_bulan->bln_thn\", ";
											}
											echo "\"Bulan/Periode berikutnya\"";
											?>],

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
