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
                        <h4 class="card-title">Laporan Data Penderita</h4>
                        <div class="table-responsive">
                            <div class="row mt-4 ml-2">
                                <div class="col">
                                    <form method="POST" action="/laporan" class="form-inline">
                                        {{-- <input type="date" name="tgl_mulai" class="form-control">
                                        <input type="date" name="tgl_selesai" class="form-control ml-1">
                                        <button type="submit" name="filter_tanggal" class="btn mb-1 btn-outline-primary ml-1" >Filter</button> --}}

                                        <a style="float: right;" class="btn mb-1 btn-outline-success ml-1   " href={{ route ('penderitaexport') }}>Export Excel</a>
                                        <a style="float: right;" class="btn mb-1 btn-outline-danger ml-1" href={{ route ('penderitapdf') }}>Export Pdf</a>
                                    </form>
                                </div>
                               
                            </div>
                                
                            {{-- <a style="float: right;" class="btn mb-1 btn-outline-success" href="/laporan/create">Export Excel</a> --}}
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Puskesmas</th>
                                        <th>Desa/Kelurahan</th>
                                        <th>Pendek</th>
                                        <th>Sangat Pendek</th>
                                        <th>Total Balita sangat Pendek+Pendek</th>
                                        <th>Pravelensi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($laporan as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kecamatan}}</td>
                                        <td>{{ $item->nama_puskes}}</td>
                                        <td>{{ $item->nama_desa}}</td>
                                        <td>{{ $item->total_pendek}}</td>
                                        <td>{{ $item->sangat_pendek}}</td>
                                        <td>{{ $item->total}}</td>
                                        <td>{{ $item->total}}</td>
                                        
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

