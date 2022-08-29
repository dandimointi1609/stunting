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
                        <h4 class="card-title">Data Puskesmas</h4>
                        <div class="table-responsive">
                            <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/puskes/create">Tambah Data</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Puskes</th>
                                        <th>Kecamatan</th>
                                        <th>Alamat</th>
                                        <th>Total Balita</th>
                                        <th>Pendek</th>
                                        <th>Sangat Pendek</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puskes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_puskes }}</td>
                                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->balita->count()}}</td>
                                        <td>{{ $item->balita->where('hasil', 'pendek')->count()}}</td>
                                        <td>{{ $item->balita->where('hasil', 'sangatpendek')->count()}}</td>



                                        <td>     
                                            <a href="{{url('ubahpuskes',$item->id_puskes)}}"  class="btn mb-1 btn-outline-primary">Update</a>
                                            {{-- <a href="/balita/edit"  class="btn mb-1 btn-outline-primary">Edit</a>    --}}
                                            {{-- <a href="{{url('delete-siswa',$item->id_siswa)}}" class="badge badge-danger">Hapus</a> --}}
                                            <a href="{{url('delete-puskes',$item->id_puskes)}}" class="btn mb-1 btn-outline-danger">Delete</a>
    
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

