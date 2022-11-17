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
                <div class="card mb-1 mt-1">
                    <div class="card-body">
                        <div class="row mt ml-1">
                            <div class="col">
                                {{-- <form method="POST" action="/laporan" class="form-inline">
                                    <a style="float: right;" class="btn mb-1 btn-outline-primary ml-1" href={{ route ('penderitaexport') }}>Pilih Periode</a>
                                    <a style="float: right;" class="btn mb-1 btn-outline-success ml-1" href={{ route ('penderitaexport') }}>Export Excel</a>
                                    <a style="float: right;" class="btn mb-1 btn-outline-danger ml-1" href={{ route ('penderitapdf') }}>Export Pdf</a>
                                </form> --}}
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                                    </div>
                                    <div class="form-inline">
                                        <a href="#" onclick="this.href='/data-penderita/'+document.getElementById('tglawal').value +
                                        '/' +document.getElementById('tglakhir').value" target="_blank" class="btn mb-1 btn-outline-danger ml-1">Export Pdf</a>
                                        <a href={{ route ('penderitaexport') }} class="btn mb-1 btn-outline-success ml-1">Export Excel</a>
                                    </div>
                                </div>
                                
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
                        <h4 class="card-title">Penderita Stunting</h4>
                        <div class="table-responsive">
                            <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/balita/create"><span class="mr-2"><i class="fa fa-pencil-square"></i></span>Tambah Data</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis kelamin</th>
                                        <th>Tgl Lahir</th>
                                        <th>Bb Lahir</th>
                                        <th>Tb Lahir</th>
                                        <th>Nama Ortu</th>
                                        <th>Kecamatan</th>
                                        <th>Puskesmas</th>
                                        <th>desa</th>
                                        <th>Alamat</th>
                                        <th>Tgl Pengukuran</th>
                                        <th>Berat</th>
                                        <th>Tinggi</th>
                                        <th>TB/U</th>
                                        <th>Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($balita as $item)
                                    @if ($item->puskes->id_puskes == Auth::user()->id_puskesmas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->nama_balita}}</td>
                                        <td>{{$item->jenis_kelamin->jenis_kelamin}}</td>
                                        <td>{{$item->tgl_lahir}}</td>
                                        <td>{{$item->bb_lahir}}</td>
                                        <td>{{$item->tb_lahir}}</td>
                                        <td>{{$item->nama_ortu}}</td>
                                        <td>{{$item->puskes->kecamatan->nama_kecamatan}}</td>
                                        <td>{{($item->puskes->nama_puskes)}}</td>
                                        <td>{{$item->desa->nama_desa}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->tgl_pengukuran}}</td>
                                        <td>{{$item->bb}}</td>
                                        <td>{{$item->tb}}</td>
                                        <td>{{$item->hasil}}</td>
                                        <td>{{$item->tgl_pengukuran}}</td>

                                        <td>     
                                            <a href="{{url('ubahbalita',$item->id_balita)}}"  class="btn mb-1 btn-outline-primary"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Ubah</a>
                                            {{-- <a href="{{url('delete-balita',$item->id_balita)}}" class="btn mb-1 btn-outline-danger">Delete </a> --}}
                                            <a href="#" class="btn mb-1 btn-outline-danger delete-desa" data-id="{{$item->id_balita}}" data-nama="{{ $item->nama_balita}}"><span class="mr-2"><i class="fa fa-trash"></i></span>Hapus</a>  

                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach                                      
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
            var kodebalita = $(this).attr('data-id')
            var namabalita = $(this).attr('data-nama')
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus Data Dengan Nama "+namabalita+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete-balita/"+kodebalita+""
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
