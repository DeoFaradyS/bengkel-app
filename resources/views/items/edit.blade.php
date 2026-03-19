<h1>Edit Sparepart</h1>

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="item_name" value="{{ $item->item_name }}">
    <input type="number" name="stock" value="{{ $item->stock }}">
    <input type="number" name="price" value="{{ $item->price }}">
    <textarea name="description">{{ $item->description }}</textarea>

    <button type="submit">Update</button>
</form>