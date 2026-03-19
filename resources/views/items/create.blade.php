<h1>Tambah Sparepart</h1>

<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <input type="text" name="item_name" placeholder="Nama">
    <input type="number" name="stock" placeholder="Stock">
    <input type="number" name="price" placeholder="Harga">
    <textarea name="description"></textarea>

    <button type="submit">Simpan</button>
</form>