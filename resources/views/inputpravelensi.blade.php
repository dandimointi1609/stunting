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
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mb-2 mt-1">
                    <div class="card-body">
                        <div class="row mt-1 ml-1">
                            <div class="col">
                                <form class="form-inline">
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                                    </div>
                                    {{-- <div class="col-lg-1 col-xl-2">    
                                        <select class="custom-select mr-sm-2 mb-3 ml-12" id="filterkecamatan">
                                            <option value="">Pilih Kecamatan..</option>
                                            @foreach ($fpravelensi as $kec)
                                                <option value="{{$kec->id_puskes}}">{{$kec->puskes->nama_puskes}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- <div class="input-group mb-3">
                                        <input type="hidden" name="filterkecamatan" id="filterkecamatan" class="form-control" value="{{ $kec->nama_puskes}}">
                                    </div> --}}
                                    <div class="input-group">
                                        <a href="#" onclick="this.href='/filter-inputpravelensi/'+document.getElementById('tglawal').value +
                                        '/' +document.getElementById('tglakhir').value" target="_blank" class="btn mb-1 btn-outline-danger ml-1">Export Pdf</a>
                                    </div>
                                    <a href="#" onclick="this.href='/inputpravelensiexport/'+document.getElementById('tglawal').value +
                                    '/' +document.getElementById('tglakhir').value" target="_blank" class="btn mb-1 btn-outline-success ml-1">Export Excel</a>        
                                    {{-- <a href={{ route ('inputpravelensiexport') }} class="btn mb-1 btn-outline-success ml-1">Export Excel</a> --}}
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pravelensi</h4>
                        <div class="table-responsive">
                            <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/inputpravelensi/create"><span class="mr-2"><i class="fa fa-pencil-square"></i></span>Tambah Data</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Nama Puskes</th>
                                        {{-- <th>Total Balita Diukur</th>
                                        <th>Pendek</th>
                                        <th>Sangat Pendek</th>
                                        <th>Total Balita sangat Pendek+Pendek</th> --}}
                                        <th>Pravelensi</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pravelensi as $item)
                                    {{-- @if ($item->user_id == Auth::user()->id) --}}

                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $item->nama_kecamatan}}</td>
                                        <td>{{ $item->nama_desa}}</td>
                                        <td>{{ $item->nama_puskes}}</td>
                                        {{-- <td>{{ $item->alamat}}</td> --}}
                                        {{-- <td>{{ $item->total_balita}}</td>
                                        <td>{{ $item->pendek}}</td>
                                        <td>{{ $item->sangat_pendek}}</td>
                                        <td>{{ $item->total_pendek_sangat}}</td> --}}
                                        {{-- <td>{{ $item->tgl_input}}</td> --}}
                                        <td>{{ $item->pravelensi}}</td>
                                        <td>
                                            <a href="{{url('ubahinputpravelensi',$item->id_pravelensi)}}"  class="btn mb-1 btn-outline-primary"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Ubah</a>
                                            {{-- <a href="{{url('delete-balita',$item->id_balita)}}" class="btn mb-1 btn-outline-danger">Delete </a> --}}
                                            <a href="#" class="btn mb-1 btn-outline-danger delete-desa" data-id="{{$item->id_pravelensi}}" data-nama="{{ $item->nama_puskes}}"><span class="mr-2"><i class="fa fa-trash"></i></span>Hapus</a>  
                                            <button type="button" class="btn mb-1 btn-outline-success" data-toggle="modal" data-target="#bd-example-modal-lg{{$item->id_pravelensi}}"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Detail</button>

                                        </td>

                                        {{-- @endif --}}
                                        <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg{{$item->id_pravelensi}}"  tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="basic-form">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6" {{ $errors->has('id_puskes') ? ' has-error' : '' }}">
                                                                    <label for="id_puskes">Nama Puskesmas
                                                                    </label>
                                                                        <div class="input-group">
                                                                        <input  class="form-control" id="id_puskes" type="hidden" name="id_puskes" value="{{ $puskes[0]->id_puskes }}" readonly="" required >
                                                                        <input type="text" class="form-control" id="nama_puskes" type="text" name="nama_puskes" value="{{ $puskes[0]->nama_puskes }}" required readonly="" >
                                                                        {{-- <span class="input-group-btn">
                                                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                                                        </span> --}}
                                                                        </div>
                                                                </div>
                            
                                                                <div class="form-group col-md-6" {{ $errors->has('kd_desa') ? ' has-error' : '' }}">
                                                                    <label  for="kode_desa">Desa Balita </label>
                                                                        <div class="input-group">
                                                                        <input  class="form-control" id="kd_desa" type="hidden" name="kd_desa" value="{{ $desa[0]->kd_desa }}" readonly="" required >
                                                                        <input type="text" class="form-control" id="nama_desa" type="text" name="nama_desa" value="{{ $desa[0]->nama_desa }}" required readonly="" >
                                                                        {{-- <span class="input-group-btn">
                                                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><span class="fa fa-search"></span></button>
                                                                        </span> --}}
                                                                        </div>
                                                                </div>
                            
                                                              
                            
                                                            </div>
                            
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6" {{ $errors->has('total_balita') ? ' has-error' : '' }}">
                                                                    <label for="total_balita" >Total Balita di Ukur</label>
                                                                    <input type="text" class="form-control" id="total_balita" name="total_balita" placeholder="Masukan Total Balita" value="{{ $item->total_balita }}" required readonly="">
                                                                </div>
                            
                                                                <div class="form-group col-md-6">
                                                                    <label  for="pendek"><b>Total Balita Pendek</b></label>
                                                                        <input type="text" class="form-control" id="pendek" placeholder="Masukan Total Balita Pendek" name="pendek" value="{{ $item->pendek }}" required readonly="">
                                                                </div>
                                
                                                            </div>
                                    
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label  for="sangat_pendek"><b>Total Balita Sangat Pendek</b></label>
                                                                        <input type="text" class="form-control" id="sangat_pendek" placeholder="Masukan Total Balita Sangat Pendek" name="sangat_pendek" value="{{ $item->sangat_pendek }}" required readonly="">
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label  for="total_pendek_sangat"><b>Total Balita Pendek & Sangat Pendek</b></label>
                                                                        <input type="text" class="form-control" id="total_pendek_sangat" placeholder="Masukan Total Balita Pendek & Sangat Pendek" name="total_pendek_sangat" value="{{ $item->total_pendek_sangat }}" required readonly="">
                                                                </div> 
                                                                <div class="form-group col-md-6">
                                                                    <label  for="tgl_input"><b>Tanggal Inputan</b></label>
                                                                        <input type="date" class="form-control" id="tgl_input" placeholder="Masukan Tanggal Inputan" name="tgl_input" value="{{ $item->tgl_input}}" required readonly="">
                                                                </div>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                   
                                    </tr>
                                   
                            </table>
                        </div>
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
            var kodepravelensi = $(this).attr('data-id')
            var namapravelensi = $(this).attr('data-nama')
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus Data Dengan Nama "+namapravelensi+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete-inputpravelensi/"+kodepravelensi+""
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
    <!-- #/ container -->
</div>
@endsection

