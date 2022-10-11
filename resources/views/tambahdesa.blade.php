@section('js')
<script type="text/javascript">
    $(document).on('click', '.pilih_kecamatan', function (e) {
                document.getElementById("nama_kecamatan").value = $(this).attr('data-kecamatan');
                document.getElementById("kd_kecamatan").value = $(this).attr('data-kd_kecamatan');
                console.log()
                $('#myModal2').modal('hide');
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
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                                    <form class="form-valide" action="/desa" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group row" {{ $errors->has('kd_kecamatan') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="kd_kecamatan">Kecamatan
                                    </label>
                                    <div class="col-lg-5">
                                        <div class="input-group">
                                        <input  class="form-control" id="kd_kecamatan" type="hidden" name="kd_kecamatan" value="{{ old('kd_kecamatan') }}" readonly="" required >
                                        <input type="text" class="form-control" id="nama_kecamatan" type="text" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}" required readonly="" >
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" {{ $errors->has('kd_desa') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="kd_desa">Kode Desa <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="kd_desa" name="kd_desa">
                                    </div>
                                </div>
                                <div class="form-group row" {{ $errors->has('nama_desa') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="nama_desa">Desa <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama_desa" name="nama_desa">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                        <th>
                            Kecamatan
                        </th>
                        </tr>
                    </thead>
                            <tbody>
                                @foreach($kecamatan as $data)
                                <tr data-dismiss="modal" aria-label="Close" class="pilih_kecamatan"  data-kecamatan="<?php echo $data->nama_kecamatan; ?>" data-kd_kecamatan="<?php echo $data->kd_kecamatan; ?>" >
                                    <td class="py-1">
                                {{$data->nama_kecamatan}}
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