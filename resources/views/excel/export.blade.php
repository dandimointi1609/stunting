<table>
    <thead style="background-color: green; color: skyblue; border: 3px solid #ee00ee">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>mobile</th>
        <th>national_id</th>
        <th>full_description</th>
        <th>thumbnai</th>
    </tr>
    </thead>
    <tbody>
    @foreach($puskes as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->mobile }}</td>
            <td>{{ $item->national_id }}</td>
            <td>{{ $item->full_description  }}</td>
            <td>{{ $item->thumbnailId  }}</td>
        </tr>
    @endforeach
    </tbody>
</table>