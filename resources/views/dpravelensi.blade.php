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
                                    <div class="col-lg-1 col-xl-2">    
                                            <select class="custom-select mr-sm-2">
                                                @foreach ($periode as $d)
                                                    <option value="{{$d->id_periode}}">{{$d->nama_periode}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    
                                    <div class="input-group mb-1">
                                        <input type="hidden" name="tglawal" id="tglawal" class="form-control" value="{{ $d->tgl_awal}}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="tglakhir" id="tglakhir" class="form-control" value="{{ $d->tgl_akhir}}">
                                    </div>
                                    <div class="input-group">
                                        <a href="#" onclick="this.href='/filter-pertanggal/'+document.getElementById('tglawal').value +
                                        '/' +document.getElementById('tglakhir').value"  target="_blank" class="btn mb-1 btn-outline-primary ml-1">cetak Pdf</a>
                                    </div>
                                    <a style="float: right;" class="btn mb-1 btn-outline-success ml-1" href={{ route ('pravelensiexport') }}>Export Excel</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid">
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
    </div> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pravelensi</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Puskes</th>
                                        <th>Alamat</th>
                                        <th>Pendek</th>
                                        <th>Sangat Pendek</th>
                                        <th>Total Balita sangat Pendek+Pendek</th>
                                        <th>Pravelensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puskes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                        <td>{{ $item->nama_puskes }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->balita}}</td>
                                        <td>{{ $item->balita}}</td>
                                        <td>{{ $item->balita}}</td>
                                        <td>{{ $item->balita}}</td>
                                    @endforeach                                   
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

