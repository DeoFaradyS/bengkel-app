<x-layouts.dashboard title="Spareparts">

    <x-header title="Sparepart" description="" />

    <x-tables.data-table>

        <x-slot:header>
            <th class="px-6 py-3 font-medium">No</th>
            <th class="px-6 py-3 font-medium">Kode</th>
            <th class="px-6 py-3 font-medium">Nama Produk</th>
            <th class="px-6 py-3 font-medium">Kategori</th>
            <th class="px-6 py-3 font-medium">Merek</th>
            <th class="px-6 py-3 font-medium">Mobil</th>
            <th class="px-6 py-3 font-medium">Stok</th>
            <th class="px-6 py-3 font-medium">Harga</th>
            <th class="px-6 py-3 font-medium">Jenis</th>
            <th class="px-6 py-3 font-medium">Aksi</th>
        </x-slot:header>

        @forelse ($spareparts as $sparepart)
            <x-tables.tr>
                <x-tables.td>{{ $loop->iteration }}</x-tables.td>
                <x-tables.td>{{ $sparepart->kode_produk }}</x-tables.td>
                <x-tables.td class="font-medium text-heading">{{ $sparepart->nama_produk }}</x-tables.td>
                <x-tables.td>{{ $sparepart->kategori }}</x-tables.td>
                <x-tables.td>{{ $sparepart->merek }}</x-tables.td>
                <x-tables.td>{{ $sparepart->mobil_tipe ?? '-' }}</x-tables.td>
                <x-tables.td>{{ $sparepart->stok }}</x-tables.td>
                <x-tables.td>Rp {{ number_format($sparepart->harga, 0, ',', '.') }}</x-tables.td>
                <x-tables.td>{{ ucfirst($sparepart->jenis_produk) }}</x-tables.td>
                <x-tables.td class="flex gap-2">
                    <x-ui.button variant="outline" size="sm"
                        data-modal-target="edit-modal-{{ $sparepart->id }}"
                        data-modal-toggle="edit-modal-{{ $sparepart->id }}">
                        Edit
                    </x-ui.button>
                    <button
                        data-modal-target="delete-sparepart-{{ $sparepart->id }}"
                        data-modal-toggle="delete-sparepart-{{ $sparepart->id }}"
                        class="text-red-600 hover:underline">
                        Hapus
                    </button>
                </x-tables.td>
            </x-tables.tr>
        @empty
            <tr>
                <td colspan="10" class="text-center py-6 text-neutral-tertiary">
                    Data sparepart belum tersedia
                </td>
            </tr>
        @endforelse

    </x-tables.data-table>

</x-layouts.dashboard>