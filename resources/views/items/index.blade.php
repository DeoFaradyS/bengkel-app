<h1>Data Sparepart</h1>

<a href="{{ route('items.create') }}">Tambah</a>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Stock</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    @foreach ($items as $item)
    <tr>
        <td>{{ $item->item_name }}</td>
        <td>{{ $item->stock }}</td>
        <td>{{ $item->price }}</td>
        <td>
            <a href="{{ route('items.edit', $item->id) }}">Edit</a>

            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>