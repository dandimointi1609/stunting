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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Penderita Stunting</h4>
                        <div class="table-responsive">
                            <a style="float: right;" class="btn mb-1 btn-outline-secondary" href="/balita/create">Tambah Data</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>tgl_lahir</th>
                                        <th>BB_lahir</th>
                                        <th>TB_lahir</th>
                                        <th>nama_ortu</th>
                                        <th>kecamatan</th>
                                        <th>Puskesmas</th>
                                        <th>desa</th>
                                        <th>alamat</th>
                                        <th>tgl_pengukuran</th>
                                        <th>BB</th>
                                        <th>TB</th>
                                        <th>TB/U</th>
                                        {{-- <th>status</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($balita as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_balita }}</td>
                                        <td>{{ $item->jenis_kelamin->jenis_kelamin}}</td>
                                        <td>{{ $item->tgl_lahir}}</td>
                                        <td>{{ $item->bb_lahir}}</td>
                                        <td>{{ $item->tb_lahir}}</td>
                                        <td>{{ $item->nama_ortu}}</td>
                                        <td>{{ $item->puskes->kecamatan->nama_kecamatan }}</td>
                                        <td>{{ $item->puskes->nama_puskes }}</td>
                                        <td>{{ $item->desa->nama_desa }}</td>
                                        <td>{{ $item->alamat}}</td>
                                        <td>{{ $item->tgl_pengukuran}}</td>
                                        <td>{{ $item->bb }}</td>
                                        <td>{{ $item->tb }}</td>
                                        <td>{{ $item->hasil }}</td>
                                        {{-- <td>{{ $item->puskes->status}}</td> --}}
                                        <td>     
                                            @if($item->puskes->status == '1')
                                            <label class="btn mb-1 btn-outline-success">Terverifikasi</label>

                                            @else
                                            <a href="{{url('ubahbalita',$item->id_balita)}}"  class="btn mb-1 btn-outline-primary">Update</a>
                                            <a href="{{url('delete-balita',$item->id_balita)}}" class="btn mb-1 btn-outline-danger">Delete </a>
                                            @endif
                                        </td>
                                        {{-- @endguest --}}
                                        
                                        {{-- @endforeach --}}
                                    </tr>
                                    @endforeach   
                                    
                                    {{-- @if($item->status == 'pinjam')
                                            <label class="badge badge-warning">Pinjam</label>
                                        @else
                                            <label class="badge badge-success">Kembali</label>
                                        @endif --}}

                                   
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection

