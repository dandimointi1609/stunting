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
                        <h4 class="card-title">Tambah Pravelensi</h4>
                        <div class="basic-form">
                                <form class="form-valide" action="/inputpravelensi" method="post">
                                    {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-6" {{ $errors->has('id_puskes') ? ' has-error' : '' }}">
                                        <label for="id_puskes">Nama Puskesmas
                                        </label>
                                            <div class="input-group">
                                            <input  class="form-control" id="id_puskes" type="hidden" name="id_puskes" value="{{ old('id_puskes') }}" readonly="" required >
                                            <input type="text" class="form-control" id="nama_puskes" type="text" name="nama_puskes"  value="{{ old('nama_puskes') }}" required readonly="" >
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                            </span>
                                            </div>
                                    </div>

                                    <div class="form-group col-md-6" {{ $errors->has('kd_desa') ? ' has-error' : '' }}">
                                        <label  for="kode_desa">Desa Balita </label>
                                            <div class="input-group">
                                            <input  class="form-control" id="kd_desa" type="hidden" name="kd_desa" value="{{ old('kd_kdesa') }}"readonly="" required >
                                            <input type="text" class="form-control" id="nama_desa" type="text" name="nama_desa" value="{{ old('nama_desa') }}"required readonly="" >
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><span class="fa fa-search"></span></button>
                                            </span>
                                            </div>
                                    </div>


                                </div>


                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6" {{ $errors->has('total_balita') ? ' has-error' : '' }}">
                                        <label for="total_balita" >Total Balita di Ukur</label>
                                        <input type="text" class="form-control" id="total_balita" name="total_balita" placeholder="Masukan Total Balita">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label  for="pendek"><b>Total Balita Pendek</b></label>
                                            <input type="text" class="form-control" id="pendek" placeholder="Masukan Total Balita Pendek" name="pendek" value="{{ old('pendek') }}">
                                    </div>

        
                                </div>
        
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label  for="sangat_pendek"><b>Total Balita Sangat Pendek</b></label>
                                            <input type="text" class="form-control" id="sangat_pendek" placeholder="Masukan Total Balita Sangat Pendek" name="sangat_pendek" value="{{ old('sangat_pendek') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label  for="total_pendek_sangat"><b>Total Balita Pendek & Sangat Pendek</b></label>
                                            <input type="text" class="form-control" id="total_pendek_sangat" placeholder="Masukan Total Balita Pendek & Sangat Pendek" name="total_pendek_sangat" value="{{ old('total_pendek_sangat') }}">
                                    </div>  
                                    <div class="form-group col-md-6">
                                        <label  for="tgl_input"><b>Tanggal Input</b></label>
                                        <input type="date" class="form-control" id="tgl_input" placeholder="Masukan Tanggal Inputan" name="tgl_input" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">

                                    </div>  
                                    
                                    {{-- <div class="form-group col-md-6"{{ $errors->has('tgl_pengukuran') ? ' has-error' : '' }}">
                                        <label  for="tgl_pengukuran">Tanggal Pengukuran</label>
                                        <input id="tgl_pengukuran" type="date" class="form-control" name="tgl_pengukuran" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" >
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_pengukuran') }}</strong>
                                            </span>
                                    </div> --}}
                                    
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