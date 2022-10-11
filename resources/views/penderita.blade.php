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
                                <form method="POST" action="/laporan" class="form-inline">
                                    <a style="float: right;" class="btn mb-1 btn-outline-primary ml-1" href={{ route ('penderitaexport') }}>Pilih Periode</a>
                                    <a style="float: right;" class="btn mb-1 btn-outline-success ml-1" href={{ route ('penderitaexport') }}>Export Excel</a>
                                    <a style="float: right;" class="btn mb-1 btn-outline-danger ml-1" href={{ route ('penderitapdf') }}>Export Pdf</a>
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
                        <h4 class="card-title">Penderita Stunting</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>kecamatan</th>
                                        <th>desa</th>
                                        <th>Puskesmas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penderita as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_balita }}</td>
                                        <td>{{ $item->jenis_kelamin->jenis_kelamin }}</td>
                                        <td>{{ $item->puskes->kecamatan->nama_kecamatan }}</td>
                                        <td>{{ $item->desa->nama_desa }}</td>
                                        <td>{{ $item->puskes->nama_puskes }}</td>
                                    </tr>
                                    @endforeach                                      
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

