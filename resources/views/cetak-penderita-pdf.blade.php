<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>


  {{-- <h1>HASIL ANALISIS PENDERITA STUNTING  KABUPATEN POHUWATO</h1> --}}
  <table width="100%">
    <tr>
    <td width="20" align="right"><img src="{{ asset('assets/images/pohuwato.png')}}" width="60%"></td>
    <td width="50" align="center"><h3><p>LAPORAN DATA BALITA STATUS GIZI SANGAT PENDEK DAN PENDEK</p>
                                              <p>UMUR 0 - 59 BULAN KABUPATEN POHUWATO</p>
                                                    <p>PERIODE BULAN FEBRUARI 2022</p></h3></td>  
    <td width="30" align="left"><img src="{{ asset('assets/images/dinkes.png')}}" width="60%"></td>
    </tr>
  </table>
  <hr>



<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>   
    <th>Periode</th>
    <th>Kecamatan</th>
    <th>Desa/Kelurahan</th>
    <th>Puskesmas</th>
  </tr>
  @foreach ($cetakpenderita as $item)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $item->nama_balita}}</td>
    <td>{{ $item->tgl_pengukuran}}</td>
    <td>{{ $item->nama_kecamatan}}</td>
    <td>{{ $item->nama_desa}}</td>
    <td>{{ $item->nama_puskes}}</td>
    </tr>
    @endforeach                                    
</table>

</body>
</html>


