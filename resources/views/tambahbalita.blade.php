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
                                        <input type="text" class="form-control" id="nama_balita" placeholder="Masukan Nama Balita" name="nama_balita" value="{{ old('nama_balita') }}">
                                    </div>
                                    <div class="form-group col-md-6" {{ $errors->has('nama_ortu') ? ' has-error' : '' }}">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukan Nama Kecamatan">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" {{ $errors->has('id_puskes') ? ' has-error' : '' }}">
                                        <label for="id_puskes">Puskesmas
                                        </label>
                                            <div class="input-group">
                                            <input  class="form-control" id="id_puskes" type="hidden" name="id_puskes" value="{{ old('id_puskes') }}" readonly="" required >
                                            <input type="text" class="form-control" id="nama_puskes" type="text" name="nama_puskes" value="{{ old('nama_puskes') }}" required readonly="" >
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                            </span>
                                            </div>
                                    </div>
        
                                    <div class="form-group col-md-6" {{ $errors->has('kode_desa') ? ' has-error' : '' }}">
                                        <label  for="kode_desa">Desa Balita </label>
                                            <div class="input-group">
                                            <input  class="form-control" id="kd_desa" type="hidden" name="kode_desa" value="{{ old('kode_desa') }}" readonly="" required >
                                            <input type="text" class="form-control" id="nama_desa" type="text" name="nama_desa" value="{{ old('nama_desa') }}" required readonly="" >
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><span class="fa fa-search"></span></button>
                                            </span>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" {{ $errors->has('tb_lahir') ? ' has-error' : '' }}">
                                        <label  for="nama_puskes">Pilih Periode</label>
                                        <input type="text" class="form-control" id="tb_lahir" name="tb_lahir" placeholder="Pilih Periode">
                                        
                                    </div>

                                    <div class="form-group col-md-6" {{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                        <label  for="tgl_lahir">Tanggal Lahir</label>
                                        <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" >
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                            </span>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="jenis kelamin"><b>Kelamin</b></label>
                                                <select class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                    </div>

                                    <div class="form-group col-md-6" {{ $errors->has('bb_lahir') ? ' has-error' : '' }}">
                                        <label for="bb_lahir" >Berat Badan Lahir</label>
                                        <input type="text" class="form-control" id="bb_lahir" name="bb_lahir" placeholder="Masukan BB(Kg)">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" {{ $errors->has('nama_ortu') ? ' has-error' : '' }}">
                                        <label for="nama_puskes">Nama orang tua</label>
                                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukan Nama Ortu">
                                    </div>
        

                                    <div class="form-group col-md-6" {{ $errors->has('tb_lahir') ? ' has-error' : '' }}">
                                        <label  for="nama_puskes">Tinggi Badan Lahir</label>
                                        <input type="text" class="form-control" id="tb_lahir" name="tb_lahir" placeholder="Masukan TB(Cm)">
                                        
                                    </div>
        
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" {{ $errors->has('alamat') ? ' has-error' : '' }}">
                                        <label for="nama_puskes">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
                                    </div>
        

                                 <div class="form-group col-md-6"{{ $errors->has('tgl_pengukuran') ? ' has-error' : '' }}">
                                        <label  for="tgl_pengukuran">Tanggal Pengukuran</label>
                                        <input id="tgl_pengukuran" type="date" class="form-control" name="tgl_pengukuran" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" >
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_pengukuran') }}</strong>
                                            </span>
                                    </div>
        
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="bb"><b>Berat Badan(kg)</b></label>
                                            <input type="text" class="form-control" id="bb" placeholder="Masukan Berat Badan pengukuran" name="bb" value="{{ old('bb') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label  for="tb"><b>Tinggi Badan(cm)</b></label>
                                            <input type="text" class="form-control" id="tb" placeholder="Masukan Tinggi Badan" name="tb" value="{{ old('tb') }}">
                                    </div>
        
                                </div>
        
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="lila"><b>Li/La</b></label>
                                            <input type="text" class="form-control" id="lila" placeholder="Masukan Li/La" name="lila" value="{{ old('lila') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label  for="Hasil"><b>TB/U</b></label>
                                            <select class="form-control" name="hasil" value="{{ old('hasil') }}">
                                                <option value="">Pilih Hasil</option>
                                                <option value="pendek">Pendek</option>
                                                <option value="sangatpendek">Sangat Pendek</option>
                                                <option value="normal">normal</option>
                                            </select>
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
                                        @foreach($desa as $data)
                                        <tr data-dismiss="modal" aria-label="Close" class="pilih_desa"  data-desa="<?php echo $data->nama_desa; ?>" data-kd_desa="<?php echo $data->kd_desa; ?>" >
                                            <td class="py-1">
                                {{-- @if($data->user->gambar)
                                    <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                                @else
                                    <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                                @endif --}}
        
                                        {{$data->nama_desa}}
                                    </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@endsection