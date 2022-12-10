<table>
    <thead>
        <tr>
            <th>Puskesmas</th>
            <th>Desa</th>
            <th>Total Balita</th>
            <th>Pendek</th>
            <th>Sangat Pendek</th>
            <th>Total Pendek + Sangat Pendek</th>
            <th>Periode</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->nama_puskes}}</td>
                <td>{{ $dt->nama_desa }}</td>
                <td>{{ $dt->total_balita }}</td>
                <td>{{ $dt->pendek }}</td>
                <td>{{ $dt->sangat_pendek }}</td>
                <td>{{ $dt->total_pendek_sangat }}</td>
                <td>{{ $dt->tgl_input }}</td>
            </tr>
        @endforeach
    </tbody>
</table>