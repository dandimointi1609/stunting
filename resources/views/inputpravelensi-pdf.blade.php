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

{{-- <img src="{{ asset('assets-real/img/logo.png') }}" alt="" width="150" height="150"> --}}

<table id="customers">
  <tr>
    <th>No</th>
    <th>Kecamatan</th>
    <th>Nama Puskes</th>
    <th>Alamat</th>
    <th>Total Balita Diukur</th>
    <th>Pendek</th>
    <th>Sangat Pendek</th>
    <th>Total Balita sangat Pendek+Pendek</th>
    <th>Pravelensi</th>
    
  </tr>
  @foreach ($filterlaporan as $item)
  <tr>
    <td>{{ $loop->iteration}}</td>
                                        <td>{{ $item->nama_kecamatan}}</td>
                                        <td>{{ $item->nama_puskes}}</td>
                                        <td>{{ $item->alamat}}</td>
                                        <td>{{ $item->total_balita}}</td>
                                        <td>{{ $item->pendek}}</td>
                                        <td>{{ $item->sangat_pendek}}</td>
                                        <td>{{ $item->total_pendek_sangat}}</td>
                                        <td>{{ $item->pravelensi}}</td>
    </tr>
    @endforeach                                    
</table>

</body>
</html>


