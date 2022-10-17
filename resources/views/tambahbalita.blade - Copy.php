@section('js')
<script type="text/javascript">
    $(document).on('click', '.pilih_puskes', function (e) {
                document.getElementById("nama_puskes").value = $(this).attr('data-puskes');
                document.getElementById("id_puskes").value = $(this).attr('data-id_puskes');
                console.log()
                $('#myModal2').modal('hide');
                // "iDisplayLength": 5
            });

    $(document).on('click', '.pilih_desa', function (e) {
                document.getElementById("nama_desa").value = $(this).attr('data-desa');
                document.getElementById("kd_desa").value = $(this).attr('data-kd_desa');
                $('#myModal').modal('hide');
                // "iDisplayLength": 5
            });

                        $(document).ready(function() {
            $("#lookup, #lookup2").DataTable({
            "iDisplayLength": 5
            });

            } );
</script>
@stop
@section('css')

@stop
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Balita</h4>
                        <div class="basic-form">
                                <form class="form-valide" action="/balita" method="post">
                                    {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nama Balita</label>
                                        <input type="text" class="form-control @error('nama_balita') is-invalid @enderror" id="nama_balita" placeholder="Masukan Nama Balita" name="nama_balita" value="{{ old('nama_balita') }}">
                                        @error('nama_balita')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tambah_kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control @error('tambah_kecamatan') is-invalid @enderror" id="tambah_kecamatan" name="tambah_kecamatan" placeholder="Masukan Nama Kecamatan" value="{{ old('tambah_kecamatan') }}">
                                        @error('tambah_kecamatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="id_puskes">Puskesmas
                                        </label>
                                            <div class="input-group">
                                            <input  class="form-control" id="id_puskes" type="hidden" name="id_puskes" value="{{ old('id_puskes') }}" readonly="" required >
                                            <input type="text" class="form-control @error('nama_puskes') is-invalid @enderror" id="nama_puskes" type="text" name="nama_puskes" value="{{ old('nama_puskes') }}" required readonly="" >
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                            </span>
                                            @error('nama_puskes')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                    </div>
        
                                    <div class="form-group col-md-6">
                                        <label  for="kode_desa">Desa Balita </label>
                                            <div class="input-group">
                                            <input  class="form-control" id="kd_desa"  name="kd_desa" value="{{ old('kd_desa') }}" readonly="" required >
                                            <input type="text" class="form-control" id="nama_desa" id="nama_desa" type="text" name="nama_desa" value="{{ old('nama_desa') }}" required readonly="" >
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><span class="fa fa-search"></span></button>
                                            </span>
                                            </div>

                                    </div>
                                </div>

                                {{-- <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="periode">Pilih Periode</label>
                                        <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode" name="periode" placeholder="Pilih Periode">
                                        @error('periode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror                                        
                                    </div> --}}

                                    <div class="form-group col-md-6">
                                        <label  for="tgl_lahir">Tanggal Lahir</label>
                                        <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" >
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                            </span>
                                            @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="jenis kelamin"><b>Kelamin</b></label>
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="bb_lahir" >Berat Badan Lahir</label>
                                        <input type="text" class="form-control @error('bb_lahir') is-invalid @enderror" id="bb_lahir" name="bb_lahir" placeholder="Masukan BB(Kg)">
                                        @error('bb_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_puskes">Nama orang tua</label>
                                        <input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" id="nama_ortu" name="nama_ortu" placeholder="Masukan Nama Ortu">
                                        @error('nama_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                    </div>
        

                                    <div class="form-group col-md-6">
                                        <label  for="nama_puskes">Tinggi Badan Lahir</label>
                                        <input type="text" class="form-control @error('tb_lahir') is-invalid @enderror" id="tb_lahir" name="tb_lahir" placeholder="Masukan TB(Cm)">
                                        @error('tb_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                    </div>
        
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_puskes">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukan Alamat">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
        

                                 <div class="form-group col-md-6">
                                        <label  for="tgl_pengukuran">Tanggal Pengukuran</label>
                                        <input id="tgl_pengukuran" type="date" class="form-control @error('tgl_pengukuran') is-invalid @enderror" name="tgl_pengukuran" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" >
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_pengukuran') }}</strong>
                                            </span>
                                            @error('tgl_pengukuran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        
                                    </div>
        
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="bb"><b>Berat Badan(kg)</b></label>
                                            <input type="text" class="form-control @error('bb') is-invalid @enderror" id="bb" placeholder="Masukan Berat Badan pengukuran" name="bb" value="{{ old('bb') }}">
                                            @error('bb')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label  for="tb"><b>Tinggi Badan(cm)</b></label>
                                            <input type="text" class="form-control @error('tb') is-invalid @enderror" id="tb" placeholder="Masukan Tinggi Badan" name="tb" value="{{ old('tb') }}">
                                            @error('tb')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
        
                                </div>
        
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="lila"><b>Li/La</b></label>
                                            <input type="text" class="form-control @error('lila') is-invalid @enderror" id="lila" placeholder="Masukan Li/La" name="lila" value="{{ old('lila') }}">
                                            @error('lila')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label  for="Hasil"><b>TB/U</b></label>
                                            <select class="form-control @error('hasil') is-invalid @enderror" name="hasil" value="{{ old('hasil') }}">
                                                <option value="">Pilih Hasil</option>
                                                <option value="pendek">Pendek</option>
                                                <option value="sangatpendek">Sangat Pendek</option>
                                                <option value="normal">normal</option>
                                            </select>
                                            @error('hasil')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                </div>
                               <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button style="float: right;" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>




{{-- modal --}}
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari Kecamatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body">
                        <table id="lookup2" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                        <th>
                            Puskes
                        </th>
                        </tr>
                    </thead>
                            <tbody>
                                @foreach($puskes as $data)
                                <tr data-dismiss="modal" aria-label="Close" class="pilih_puskes"  data-puskes="<?php echo $data->nama_puskes; ?>" data-id_puskes="<?php echo $data->id_puskes; ?>" >
                                    <td class="py-1">
                        {{-- @if($data->user->gambar)
                            <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                        @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                        @endif --}}

                                {{$data->nama_puskes}}
                            </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" style="background: #fff;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                                <table id="lookup" class="table table-bordered table-hover table-striped">
                                    <thead>
                                <tr>
                                <th>
                                    Desa
                                </th>
                                </tr>
                            </thead>
                                    <tbody>
                                        @foreach($balita as $data)
                                        <tr data-dismiss="modal" aria-label="Close" class="pilih_desa"  data-desa="<?php echo $data->desa->nama_desa; ?>" data-kd_desa="<?php echo $data->desa->kd_desa; ?>" >
                                            <td class="py-1">
                                {{-- @if($data->user->gambar)
                                    <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                                @else
                                    <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                                @endif --}}
        
                                        {{$data->desa->nama_desa}}
                                    </td>
                                    </tr>
                                    {{-- @endif  --}}

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@endsection