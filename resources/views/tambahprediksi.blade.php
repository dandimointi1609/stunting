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
                                    <form class="form-valide" action="/prediksi" method="post">
                                        {{ csrf_field() }}
                                <div class="form-group row" {{ $errors->has('bln_thn') ? ' has-error' : '' }}>
                                    <label class="col-lg-4 col-form-label" for="bln_thn">Bulan-Tahun<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="bln_thn" name="bln_thn">
                                    </div>
                                </div>
                                <div class="form-group row" {{ $errors->has('d_aktual') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="d_aktual">Data Aktual <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="d_aktual" name="d_aktual">
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