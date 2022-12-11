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
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                                    </div>
                                    <div class="form-inline">
                                        <a href="#" onclick="this.href='/filter-laporan/'+document.getElementById('tglawal').value +
                                        '/' +document.getElementById('tglakhir').value" target="_blank" class="btn mb-1 btn-outline-danger ml-1">Export Pdf</a>
                                        <a href={{ route ('laporanexport') }} class="btn mb-1 btn-outline-success ml-1">Export Excel</a>
                                    </div>
                                </div>
                                
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
                        <h4 class="card-title">Penderita Stunting</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis kelamin</th>
                                        <th>Nama Ortu</th>
                                        <th>Kecamatan</th>
                                        <th>desa</th>
                                        <th>TB/U</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penderita as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->nama_balita}}</td>
                                        <td>{{$item->jenis_kelamin->jenis_kelamin}}</td>
                                        <td>{{$item->nama_ortu}}</td>
                                        <td>{{$item->puskes->kecamatan->nama_kecamatan}}</td>
                                        <td>{{$item->desa->nama_desa}}</td>
                                        <td>{{$item->hasil}}</td>
                                        <td>
                                            <button type="button" class="btn mb-1 btn-outline-success" data-toggle="modal" data-target="#bd-example-modal-lg{{$item->id_balita}}"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Detail</button>
                                        </td>
                                    </tr>


                                                                         <!-- Large modal -->
                                    <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg{{$item->id_balita}}"  tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                <div class="form-group col-md-6">
                                                                    <label>Nama Balita</label>
                                                                    <input type="text" class="form-control" id="nama_balita" placeholder="Masukan Nama Balita" name="nama_balita" value="{{ $item->nama_balita}}" required readonly="" >
                                                                </div>
                                                                <div class="form-group col-md-6" {{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                                                                    <label for="tambah_kecamatan">Nama Kecamatan</label>
                                                                    <input type="text" class="form-control" id="tambah_kecamatan" name="tambah_kecamatan" placeholder="Masukan Nama Kecamatan" value="{{ $item->tambah_kecamatan}}" required readonly="" >
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6" {{ $errors->has('id_puskes') ? ' has-error' : '' }}">
                                                                    <label for="id_puskes">Puskesmas
                                                                    </label>
                                                                        <div class="input-group">
                                                                        <input  class="form-control" id="id_puskes" type="hidden" name="id_puskes" value="{{ $item->id_puskes}}" readonly="" required >
                                                                        <input type="text" class="form-control" id="nama_puskes" type="text" name="nama_puskes" value="{{ $item->puskes->nama_puskes}}" required readonly="">
                                                                        {{-- <span class="input-group-btn">
                                                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                                                        </span> --}}
                                                                        </div>
                                                                </div>
                                    
                                                                <div class="form-group col-md-6" {{ $errors->has('kode_desa') ? ' has-error' : '' }}">
                                                                    <label  for="kode_desa">Desa Balita </label>
                                                                        <div class="input-group">
                                                                        <input  class="form-control" id="kd_desa" type="hidden" name="kode_desa" value="{{ $item->kode_desa}}" readonly="" required >
                                                                        <input type="text" class="form-control" id="nama_desa" type="text" name="nama_desa" value="{{ $item->desa->nama_desa}}" required readonly="" >
                                                                        {{-- <span class="input-group-btn">
                                                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><span class="fa fa-search"></span></button>
                                                                        </span> --}}
                                                                        </div>
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6" {{ $errors->has('tb_lahir') ? ' has-error' : '' }}">
                                                                    <label  for="nama_puskes">Pilih Periode</label>
                                                                    <input type="text" class="form-control" id="tb_lahir" name="tb_lahir" placeholder="Pilih Periode" required readonly="" >
                                                                    
                                                                </div>
                            
                                                                <div class="form-group col-md-6" {{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                                                    <label  for="tgl_lahir">Tanggal Lahir</label>
                                                                    <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ $item->tgl_lahir}}" required readonly="" >
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                                                        </span>
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label  for="jenis kelamin"><b>Kelamin</b></label>
                                                                            <select class="form-control" name="jenis_kelamin" value="{{$item->jenis_kelamin->jenis_kelamin}}" required readonly="" >
                                                                                <option value="{{$item->id_jenis_kelamin}}">{{$item->jenis_kelamin->jenis_kelamin}}</option>
                                                                                <option value="1">Laki - Laki</option>
                                                                                <option value="2">Perempuan</option>
                                                                            </select>
                                                                </div>
                            
                                                                <div class="form-group col-md-6" {{ $errors->has('bb_lahir') ? ' has-error' : '' }}">
                                                                    <label for="bb_lahir" >Berat Badan Lahir</label>
                                                                    <input type="text" class="form-control" id="bb_lahir" name="bb_lahir" placeholder="Masukan BB(Kg)" value="{{$item->bb_lahir}}" required readonly="" >
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6" {{ $errors->has('nama_ortu') ? ' has-error' : '' }}">
                                                                    <label for="nama_puskes">Nama orang tua</label>
                                                                    <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukan Nama Ortu" value="{{$item->nama_ortu}}" required readonly="" >
                                                                </div>
                                    
                            
                                                                <div class="form-group col-md-6" {{ $errors->has('tb_lahir') ? ' has-error' : '' }}">
                                                                    <label  for="nama_puskes">Tinggi Badan Lahir</label>
                                                                    <input type="text" class="form-control" id="tb_lahir" name="tb_lahir" placeholder="Masukan TB(Cm)" value="{{$item->tb_lahir}}" required readonly="" >
                                                                    
                                                                </div>
                                    
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6" {{ $errors->has('alamat') ? ' has-error' : '' }}">
                                                                    <label for="nama_puskes">Alamat</label>
                                                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" value="{{$item->alamat}}" required readonly="" >
                                                                </div>
                                    
                            
                                                             <div class="form-group col-md-6"{{ $errors->has('tgl_pengukuran') ? ' has-error' : '' }}">
                                                                    <label  for="tgl_pengukuran">Tanggal Pengukuran</label>
                                                                    <input id="tgl_pengukuran" type="date" class="form-control" name="tgl_pengukuran" value="{{$item->tgl_pengukuran}}" required readonly="" >
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('tgl_pengukuran') }}</strong>
                                                                        </span>
                                                                </div>
                                    
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label  for="bb"><b>Berat Badan(kg)</b></label>
                                                                        <input type="text" class="form-control" id="bb" placeholder="Masukan Berat Badan pengukuran" name="bb" value="{{$item->bb}}" required readonly="" >
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label  for="tb"><b>Tinggi Badan(cm)</b></label>
                                                                        <input type="text" class="form-control" id="tb" placeholder="Masukan Tinggi Badan" name="tb" value="{{$item->tb}}" required readonly="" >
                                                                </div>
                                    
                                                            </div>
                                    
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label  for="lila"><b>Li/La</b></label>
                                                                        <input type="text" class="form-control" id="lila" placeholder="Masukan Li/La" name="lila" value="{{$item->lila}}" required readonly="" >
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label  for="Hasil"><b>TB/U</b></label>
                                                                        <select class="form-control" name="hasil" value="{{$item->hasil}}" required readonly="" >
                                                                            {{-- <option value="{{$balita->hasil}}">{{$balita->hasil}}</option> --}}
                                                                            <option value="pendek">Pendek</option>
                                                                            <option value="sangatpendek">Sangat Pendek</option>
                                                                            <option value="normal">normal</option>
                                                                        </select>
                                                                </div>
                                    
                                                            </div>
                                                        </form>
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

