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
                        <div class="form-validation">
                                <form  action="/kecamatan" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama">Kode Kecamatan <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="kd_kecamatan" placeholder="Masukan Kode Kecamatan" name="kd_kecamatan" value="{{ old('kd_kecamatan') }}">
                                        </div>
                                    </div> 
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Kecamatan <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama_kecamatan" placeholder="Masukan Kecamatan" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}">
                                    </div>
                                </div>   
                             
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Pilih Lokasi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama_kecamatan" placeholder="Masukan Kecamatan" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}">
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
@endsection