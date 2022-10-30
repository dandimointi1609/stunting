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
                        <h4 class="card-title">Tambah Pengguna</h4>
                        <div class="basic-form">
                                <form action="{{ url('pengguna/update/' .$item->id) }}" method="POST">
                                    @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="name" placeholder="Masukan Nama" name="name" value="{{ $item->name}}">
                                    </div>
                                    <div class="form-group col-md-6" {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" value="{{ $item->password}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" >Username</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Username" value="{{ $item->email}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label  for="level"><b>Pengguna</b></label>
                                                <select class="form-control"  name="level" onchange="myFunction()" id="level">
                                                    <option value="">Pilih Pengguna</option>
                                                    <option value="bptd">bptd</option>
                                                    <option value="puskes">Puskesmas</option>
                                                    <option value="dinkes">dinkes</option>
                                                    <option value="admin">admin</option>
                                                </select>
                                    </div>
                                    <div class="col-12" id="show-puskes">
                                        <input type="hidden" name="id_puskesmas" id="puskes" value="0" />
                                    </div>
                                </div>
                               <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button  style="float: right;type="submit" class="btn btn-primary">Submit</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

function myFunction() {
  var x = document.getElementById("level").value;
    if(x == 'puskes'){
            $('#show-puskes').html('<div class="form-row">'+
                                    '<div class="col-12">'+
                                        '<label  for="level"><b>Pilih Puskesmas</b></label>'+
                                            '<select class="form-control" name="id_puskesmas" id="id_puskesmas">'+
                                              '<option selected>---Pilih Puskesmas---</option>'+
                                              @foreach ($puskes as $kec)
                                                  '<option  value="{{$kec->id_puskes}}">{{$kec->nama_puskes}}</option>'+
                                              @endforeach
                                            '</select>'+
                                            '</div>'+
                                    '</div>'+
                                    '</div><br/>');
        }else{
            $('#show-puskes').html('<input type="hidden" name="id_puskesmas" id="puskes" value="0" />');
        }
}
</script>