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
                                    {{-- <div class="col-lg-1 col-xl-2">    
                                        <div class="col-lg-1 col-xl-2">    
                                            <select class="custom-select mr-sm-2 mb-3" id="fperiode">
                                                @foreach ($periode as $d)
                                                    <option value="{{$d->id_periode}}">{{$d->nama_periode}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                                    </div>
                                    {{-- <div class="input-group mb-3">
                                        <input type="hidden" name="fperiode" id="fperiode" class="form-control" value="{{ $d->id_periode}}">
                                    </div> --}}
                                    <div class="input-group">
                                        <a href="#" onclick="this.href='/cetakpertangal/'+document.getElementById('tglawal').value +
                                        '/' +document.getElementById('tglakhir').value" target="_blank" class="btn mb-1 btn-outline-primary ml-1">cetak Pdf</a>
                                    </div>

                                    <a href="#" onclick="this.href='/laporanpravelensiexport/'+document.getElementById('tglawal').value +
                                    '/' +document.getElementById('tglakhir').value" target="_blank" class="btn mb-1 btn-outline-success ml-1">Export Excel</a> 
                                    {{-- <a style="float: right;" class="btn mb-1 btn-outline-success ml-1" href={{ route ('penderitaexport') }}>Export Excel</a> --}}

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
                        <h3 class="card-title"><i class="fa fa-pencil-square display-12 "></i>Laporan Data Penderita</span></h3>
                        {{-- <br> --}}
                        {{-- <h4 class="card-title">Laporan Data Penderita</h4> --}}
                        <div class="table-responsive">

                                
                            {{-- <a style="float: right;" class="btn mb-1 btn-outline-success" href="/laporan/create">Export Excel</a> --}}
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        {{-- <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Puskesmas</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Balita Diukur</th>                                     
                                        <th>Pendek</th>
                                        <th>Sangat Pendek</th>
                                        <th>Total</th>
                                        <th>Pravelensi</th> --}}
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Puskes</th>
                                        {{-- <th>Alamat</th> --}}
                                        <th>Total Balita Diukur</th>
                                        <th>Pendek</th>
                                        <th>Sangat Pendek</th>
                                        <th>Total Balita sangat Pendek+Pendek</th>
                                        <th>Pravelensi</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>

                                </thead>
                                <tbody>
                                    {{-- @foreach ($laporan as $item)
                                    @if ($item->id_puskes == Auth::user()->id_puskesmas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kecamatan}}</td>
                                        <td>{{ $item->nama_desa}}</td>
                                        <td>{{ $item->nama_puskes}}</td>
                                        <td>{{ $item->tgl_pengukuran}}</td>
                                        <td>{{ $item->total}}</td>
                                        <td>{{ $item->total_pendek}}</td>
                                        <td>{{ $item->sangat_pendek}}</td>
                                        <td>{{ $item->pendek_sangat_pendek}}</td>
                                        <td>{{ $item->pravelensi}}</td>
                                    </tr>
                                    @elseif (Auth::user()->level=='bptd')
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kecamatan}}</td>
                                        <td>{{ $item->nama_desa}}</td>
                                        <td>{{ $item->nama_puskes}}</td>
                                        <td>{{ $item->tgl_pengukuran}}</td>
                                        <td>{{ $item->total}}</td>
                                        <td>{{ $item->total_pendek}}</td>
                                        <td>{{ $item->sangat_pendek}}</td>
                                        <td>{{ $item->pendek_sangat_pendek}}</td>
                                        <td>{{ $item->pravelensi}}</td>
                                    </tr>
                                    @endif
                                    @endforeach                                    --}}

                                    @foreach ($pravelensi as $item)
                                    @if ($item->id_puskes == Auth::user()->id_puskesmas)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $item->nama_kecamatan}}</td>
                                        <td>{{ $item->nama_puskes}}</td>
                                        {{-- <td>{{ $item->alamat}}</td> --}}
                                        <td>{{ $item->total_balita}}</td>
                                        <td>{{ $item->pendek}}</td>
                                        <td>{{ $item->sangat_pendek}}</td>
                                        <td>{{ $item->total_pendek_sangat}}</td>
                                        {{-- <td>{{ $item->tgl_input}}</td> --}}
                                        <td>{{ $item->pravelensi}}</td>
                                    </tr>
                                    @elseif (Auth::user()->level=='bptd')
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $item->nama_kecamatan}}</td>
                                        <td>{{ $item->nama_puskes}}</td>
                                        {{-- <td>{{ $item->alamat}}</td> --}}
                                        <td>{{ $item->total_balita}}</td>
                                        <td>{{ $item->pendek}}</td>
                                        <td>{{ $item->sangat_pendek}}</td>
                                        <td>{{ $item->total_pendek_sangat}}</td>
                                        {{-- <td>{{ $item->tgl_input}}</td> --}}
                                        <td>{{ $item->pravelensi}}</td>
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
    <!-- #/ container -->
</div>
@endsection

