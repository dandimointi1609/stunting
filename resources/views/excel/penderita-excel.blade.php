<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jk</th>
            <th>Tgl Lahir</th>
            <th>Bb Lahir</th>
            <th>Tb Lahir</th>
            <th>Nama Ortu</th>
            <th>Kec</th>
            <th>Puskesmas</th>
            <th>Desa/Kel</th>
            <th>Alamat</th>
            <th>Tgl Pengukuran</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>TB/U</th>
            <th>Periode</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        @if ($item->id_puskes == Auth::user()->id_puskesmas)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$item->nama_balita}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->tgl_lahir}}</td>
                <td>{{$item->bb_lahir}}</td>
                <td>{{$item->tb_lahir}}</td>
                <td>{{$item->nama_ortu}}</td>
                <td>{{$item->nama_kecamatan}}</td>
                <td>{{($item->nama_puskes)}}</td>
                <td>{{$item->nama_desa}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->tgl_pengukuran}}</td>
                <td>{{$item->bb}}</td>
                <td>{{$item->tb}}</td>
                <td>{{$item->hasil}}</td>
                <td>{{$item->tgl_pengukuran}}</td>
            </tr>
        @elseif (Auth::user()->level=='bptd')
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->nama_balita}}</td>
            <td>{{$item->jenis_kelamin}}</td>
            <td>{{$item->tgl_lahir}}</td>
            <td>{{$item->bb_lahir}}</td>
            <td>{{$item->tb_lahir}}</td>
            <td>{{$item->nama_ortu}}</td>
            <td>{{$item->nama_kecamatan}}</td>
            <td>{{($item->nama_puskes)}}</td>
            <td>{{$item->nama_desa}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->tgl_pengukuran}}</td>
            <td>{{$item->bb}}</td>
            <td>{{$item->tb}}</td>
            <td>{{$item->hasil}}</td>
            <td>{{$item->tgl_pengukuran}}</td>
        </tr>
            @endif
        @endforeach
    </tbody>
</table>