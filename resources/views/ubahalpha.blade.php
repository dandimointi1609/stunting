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
                            <form action="{{ url('forecasting/update/' .$forecasting->id_alpha) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama">Kode Alpha <span class="text-danger">*</span></label>
                                        
                                            <input type="text" class="form-control col-lg-6" id="id_alpha" placeholder="Masukan Nama Desa" name="id_alpha" value="{{ $forecasting->id_alpha}}">
                                    </div> 
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nilai_alpha">Nilai Alpha <span class="text-danger">*</span>
                                        </label>
                                            <input type="text" class="form-control col-lg-6" id="nilai_alpha" placeholder="Masukan Latitude" name="nilai_alpha" value="{{ $forecasting->nilai_alpha }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button style="float: right; type="submit" class="btn btn-primary"><span class="mr-2"><i class="fa fa-floppy-o"></i></span>Submit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
</div>
@endsection

