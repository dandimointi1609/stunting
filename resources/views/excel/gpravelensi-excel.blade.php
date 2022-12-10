<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kecamatan</th>
            <th>Nama Puskes</th>
            {{-- <th>Alamat</th> --}}
            <th>Total Balita Diukur</th>
            <th>Pendek</th>
            <th>Sangat Pendek</th>
            <th>Total Balita sangat Pendek+Pendek</th>
            <th>Pravelensi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $item->nama_kecamatan}}</td>
                <td>{{ $item->nama_puskes}}</td>
                {{-- <td>{{ $item->alamat}}</td> --}}
                <td>{{ $item->total_balita}}</td>
                <td>{{ $item->pendek}}</td>
                <td>{{ $item->sangat_pendek}}</td>
                <td>{{ $item->total_pendek_sangat}}</td>
                <td>{{ $item->pravelensi}}</td>
            </tr>
        @endforeach
    </tbody>
</table>