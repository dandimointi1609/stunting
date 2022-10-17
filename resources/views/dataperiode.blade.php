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
                            <form class="form-valide" action="/dataperiode" method="post">
                             {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="nama_periode">Tahun/Bulan Periode <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-lg-6 @error('nama_periode') is-invalid @enderror" id="nama_periode" placeholder="Masukan Bulan Dan Tahun Periode" name="nama_periode" value="{{ old('nama_periode') }}">
                                            @error('nama_periode')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div> 
                                    <div class="form-group row col-md-6 ">
                                        <label class="col-lg-4 col-form-label" for="jenis_periode">Jenis Periode <span class="text-danger">*</span>
                                        </label>
                                            <input type="text" class="form-control col-lg-6 @error('jenis_periode') is-invalid @enderror" id="jenis_periode" placeholder="Masukan Jenis Periode" name="jenis_periode" value="{{ old('jenis_periode') }}">
                                            @error('jenis_periode')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group row col-md-6">
                                        <label class="col-lg-4 col-form-label" for="tgl_awal">Dari Hari <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control col-lg-6 @error('tgl_awal') is-invalid @enderror">
                                        @error('tgl_awal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-group row col-md-6">
                                        <label class="col-lg-4 col-form-label" for="tgl_akhir">Sampai Hari <span class="text-danger">*</span>
                                        </label>
                                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control col-lg-6 @error('tgl_akhir') is-invalid @enderror">
                                            @error('tgl_akhir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>

                                </div>                               
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button style="float: right; type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <ul class="nav nav-pills" >
                            <li class="nav-item col-sm-6 col-md-6 col-xl-6"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Periode Sebaran</a>
                            </li>
                            <li class="nav-item col-sm-6 col-md-6 col-xl-6""><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Periode Pravelensi</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Periode</h4>
                @foreach ($periode as $item)
                <div class="tab-content br-n pn">
                    <div id="navpills-1" class="tab-pane active">
                        <div class="row align-items-center">
                            <div class="col-sm-8 col-md-8 col-xl-12">
                                <br>{{ $loop->iteration }}. {{ $item->nama_periode }}
                                <br>{{ $item->tgl_awal }} s/d {{ $item->tgl_akhir}}
                                <br>{{ $item->hasil}}
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="tglawal" id="tglawal" class="form-control" value="{{ $item->tgl_awal}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="tglakhir" id="tglakhir" class="form-control" value="{{ $item->tgl_akhir}}">
                                </div>
                                <div class="form-inline">
                                    <a href="#" onclick="this.href='/data-pertangal/'+document.getElementById('tglawal').value +
                                    '/' +document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">Validasi</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="navpills-2" class="tab-pane">
                        <div class="row align-items-center">
                            <div class="col-sm-8 col-md-8 col-xl-12">
                                <br>1. Agustus 2021
                                <br>28 Februari 2021 s/d 31 agustus 2022
                                <br>Total Penderita
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection