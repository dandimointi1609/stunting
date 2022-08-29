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
                        <h4 class="card-title">Data Kecamatan</h4>
                        <div class="table-responsive">
                            <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/kecamatan/create">Tambah Data</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kecamatan</th>
                                        <th>Kecamatan</th>
                                        {{-- <th>longitude</th> --}}

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kecamatan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kd_kecamatan }}</td>
                                        <td>{{ $item->nama_kecamatan }}</td>
                                        {{-- <td>{{ $item->latitude }}</td> --}}
                                        <td>     
                                            <a href="{{url('ubahkecamatan',$item->kd_kecamatan)}}"  class="btn mb-1 btn-outline-primary">Edit</a>
                                            {{-- <a href="/balita/edit"  class="btn mb-1 btn-outline-primary">Edit</a>    --}}
                                            {{-- <a href="{{url('delete-siswa',$item->id_siswa)}}" class="badge badge-danger">Hapus</a> --}}
                                            <a href="{{url('delete-kecamatan',$item->kd_kecamatan)}}" class="btn mb-1 btn-outline-danger">Hapus</a>   
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

