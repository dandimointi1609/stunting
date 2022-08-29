{{-- @extends('layouts.master')

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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pravelensi</h4>
                        <div class="table-responsive">
                            <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/dpravelensi/create">Tambah Data</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Puskesmas</th>
                                        <th>Desa/Kelurahan</th>
                                        <th>Jumlah Balita</th>
                                        <th>Sangat Pendek</th>
                                        <th>Pendek</th>
                                        <th>Total Balita sangat Pendek+Pendek</th>
                                        <th>Pravelensi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Popayato</td>
                                        <td>Popayato</td>
                                        <td>Torosiaje</td>
                                        <td>94</td>
                                        <td>5</td>
                                        <td>3</td>
                                        <td>8</td>
                                        <td>4.32</td>
                                        <td>     
                                            <a href=""  class="btn mb-2 btn-outline-primary">Edit</a>   
                                            <form action=" " class="btn mb-2 btn-outline-danger" method=" ">Hapus
                                            </form>                                     
                                        </td>
                                    </tr>
                                   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection --}}

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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pravelensi</h4>
                        <div class="table-responsive">
                            {{-- <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/puskes/create">Tambah Data</a> --}}
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Puskes</th>
                                        {{-- <th>Alamat</th> --}}
                                        {{-- <th>Desa</th> --}}
                                        {{-- <th>Total Balita</th> --}}
                                        <th>Pendek</th>
                                        <th>Sangat Pendek</th>
                                        <th>Total Balita sangat Pendek+Pendek</th>
                                        <th>Pravelensi</th>
                                        {{-- <th>Approve</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dpravelensi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                        <td>{{ $item->nama_puskes }}</td>
                                        {{-- <td>{{ $item->Kecamatan }}</td> --}}
                                        <td>{{ $item->balita->where('hasil', 'pendek')->count()}}</td>
                                        <td>{{ $item->balita->where('hasil', 'sangat pendek')->count()}}</td>
                                        <td>{{ $item->balita->count()}}</td>
                                        <td>{{ $item->balita->count()}}</td>
                                        <td>  
                                     
                                        @if($item->status == '0')
                                           <form action ="{{ route('dpravelensi.update', $item->id_puskes) }}" method="post" enctype="multipart/form-data">
                                                 {{ csrf_field() }}
                                                 {{ method_field('put') }}
                                                      <button class="btn mb-1 btn-outline-primary" onclick="return confirm('Anda yakin data ini di Verifikasi?')">Verifikasi
                                                      </button>
                                                    </form>
                                                    @else  
            
                                                             <button class="btn mb-1 btn-outline-success" onclick="return confirm('Anda yakin data ini di Verifikasi?')"> Terverifikasi
                                                             </button>
                                                               
                                                    {{-- <label class="label {{ ($item->status == 0 ) ? 'label-danger' : 'label-success' }} "> {{ ($item->status == 0) ?  'verifikasi' : 'Terverifikasi' }} --}}
                                                    @endif
                                    @endforeach                                   
                                        </td>
                                    </tr>
                                   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection

