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

{{-- @section('title', 'SMAMBAT') --}}

@section('content')
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Penderita</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Balita Pendek</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">8541</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Balita Sangat Pendek</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>    --}}
                    </div>
                </div>
            </div>
        </div>
         
    </div>
    <!-- #/ container -->
</div>
@endsection
