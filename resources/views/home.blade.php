{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('layouts.master')

@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="alert alert-info"> Selamat Datang {{ Auth::user()->name }}</div>
        @guest
        @else
        @if (Auth::user()->level=='puskes') 
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-male"></i><span class="nav-text ml-2">Data Penderita Stunting</span></h3>
                        {{-- <h3 class="card-title text-white">Data Penderita Stunting</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$balita->where('hasil')->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-bar-chart"></i><span class="nav-text ml-2">Data Pravelensi</span></h3>
                        {{-- <h3 class="card-title text-white">Data Pravelensi</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">10</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endguest 
        
        @guest
        @else
        @if (Auth::user()->level=='bptd') 
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-university"></i><span class="nav-text ml-2">Data Kecamatan</span></h3>
                    {{-- <h3 class="card-title text-white">Data Kecamatan</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$kecamatan->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-building"></i><span class="nav-text ml-2">Data Desa</span></h3>

                        {{-- <h3 class="card-title text-white">Data Desa</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$desa->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-users"></i><span class="nav-text ml-2">Data User</span></h3>

                        {{-- <h3 class="card-title text-white">Data Pengguna</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">5</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @endif
        @endguest 
        
        @guest
        @else
        @if (Auth::user()->level=='dinkes') 
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-male"></i><span class="nav-text ml-2">Data Penderita Stunting</span></h3>

                        {{-- <h3 class="card-title text-white">Data Penderita Stunting</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$balita->where('hasil')->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-bar-chart"></i><span class="nav-text ml-2">Data Pravelensi</span></h3>
                        {{-- <h3 class="card-title text-white">Data Pravelensi</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">8</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white"><i class="fa fa-hospital-o"></i><span class="nav-text ml-2">Data Puskesmas</span></h3>

                        {{-- <h3 class="card-title text-white">Data Puskesmas</h3> --}}
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$puskes->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endguest

        <p>
        <br>
            {{-- <center><h1>Selamat Datang {{ Auth::user()->name }} </h1></center> --}}

    </div> 
</div>
@endsection
