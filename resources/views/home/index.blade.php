<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Tạo Mới</th>
    </thead>
    <tbody>
        @foreach ($cates as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><a href="{{ route('cate.remove', ['id' => $item->id]) }}">Xóa</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
