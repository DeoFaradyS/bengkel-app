@extends('layouts.admin')

@section('title', 'Spareparts')

@section('content')

    <x-layout.page-header>

        <x-slot:left>
            <x-forms.input placeholder="Cari sparepart..." />
        </x-slot:left>

        <x-slot:right>

            <button class="px-4 py-2 text-sm border border-default rounded-base hover:bg-neutral-secondary-soft transition">
                Export
            </button>

            <x-modal.form-modal id="crud-modal" title="Create new product" action="{{ route('spareparts.store') }}"
                buttonText="Tambah Sparepart">

                <div class="space-y-4">
                    <x-forms.input name="nama" label="Nama Sparepart" required />
                    <x-forms.input name="stok" label="Stok" type="number" required />
                    <x-forms.input name="harga" label="Harga" type="number" required />
                </div>

            </x-modal.form-modal>

        </x-slot:right>

    </x-layout.page-header>

    <x-tables.data-table>

        <x-slot:header>
            <th class="px-6 py-3 font-medium">Nama</th>
            <th class="px-6 py-3 font-medium">Stok</th>
            <th class="px-6 py-3 font-medium">Harga</th>
        </x-slot:header>


        @forelse ($spareparts as $sparepart)

            <tr class="bg-neutral-primary border-b border-default">

                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>

                <td class="px-6 py-4 font-medium text-heading">
                    {{ $sparepart->nama }}
                </td>

                <td class="px-6 py-4">
                    {{ $sparepart->stok }}
                </td>

                <td class="px-6 py-4">
                    Rp {{ number_format($sparepart->harga, 0, ',', '.') }}
                </td>

                <td class="px-6 py-4 flex gap-2">

                    <a href="#" class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <x-modal-delete :id="'delete-' . $sparepart->id" :message="'Yakin hapus ' . $sparepart->nama . '?'"
                        :action="route('spareparts.destroy', $sparepart->id)" />

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center py-6 text-neutral-tertiary">
                    Data sparepart belum tersedia
                </td>
            </tr>

        @endforelse

    </x-tables.data-table>  

@endsection