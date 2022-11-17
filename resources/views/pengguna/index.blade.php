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
                        <h3 class="card-title"><i class="fa fa-pencil-square display-12 "></i>Tambah Data Pengguna</span></h3>
                        <br>
                        {{-- <h4 class="card-title">Tambah Pengguna</h4> --}}
                        <div class="basic-form">
                                <form class="form-valide" method="post" action="{{ route('pengguna.store') }}">

                                    {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="name" placeholder="Masukan Nama" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-6" {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" >Username</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Username">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label  for="level"><b>Pengguna</b></label>
                                                <select class="form-control" name="level" onchange="myFunction()" id="level">
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
                                                <button  style="float: right;type="submit" class="btn btn-primary"><span class="mr-3"><i class="fa fa-floppy-o"></i></span>Submit</button>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengguna</h4>
                        <div class="table-responsive">
                            {{-- <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="{{ route('pengguna.create') }}">Tambah Data</a> --}}
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        {{-- <th>Password</th> --}}
                                        <th>Pengguna</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengguna as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        {{-- <td>{{ $item->password}}</td> --}}
                                        <td>{{ $item->level }}</td>
                                        <td>     
                                            <a href="{{ url('edit', $item->id) }}"  class="btn mb-1 btn-outline-primary"><span class="mr-2"><i class="fa fa-pencil-square-o"></i></span>Ubah</a>
                                            <form action="{{ route('pengguna.destroy', $item->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            <button  class="btn mb-1 btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><span class="mr-2"><i class="fa fa-trash"></i></span>Hapus</button>
                                            {{-- <button  class="btn mb-1 btn-outline-danger delete"> Delete</button> --}}
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach                                      
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script>
        $('.delete-desa').click( function(){
            var kodebalita = $(this).attr('data-id')
            var namabalita = $(this).attr('data-nama')
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus Data Dengan Nama "+namabalita+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete-balita/"+kodebalita+""
                        swal("Data Berhasil Di Hapus", {
                        icon: "success",
                        });
                    } else {
                        swal("Data Tidak Jadi Di Hapus");
                    }
                });
        });
    </script> --}}

    <script>
            @if (Session::has('success'))
            toastr.success("{{ Session::get('success')}}")
        @endif
    </script>
    
    <!-- #/ container -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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


// $('.delete').click( function(){

//         swal({
//                 title: "Yakin?",
//                 text: "Kamu akan menghapus Data Pengguna dengan id "+id+",
//                 icon: "warning",
//                 buttons: true,
//                 dangerMode: true,
//                 })
//                 .then((willDelete) => {
//                 if (willDelete) {
//                     swal("Poof! Your imaginary file has been deleted!", {
//                     icon: "success",
//                     });
//                 } else {
//                     swal("Your imaginary file is safe!");
//                 }
//          });

// })



</script>
    
</div>
@endsection
