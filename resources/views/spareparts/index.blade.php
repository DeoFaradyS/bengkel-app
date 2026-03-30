@extends('layouts.admin')

@section('title', 'Spareparts')

@section('content')

    <x-layout.page-header>

        <x-slot:left>
            <x-forms.input placeholder="Cari sparepart..." />
        </x-slot:left>

        <x-slot:right>

            <x-ui.button variant="outline">
                Export
            </x-ui.button>

            <x-ui.button data-modal-target="crud-modal" data-modal-toggle="crud-modal" :icon='
                "<svg class=\"w-6 h-6\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\">
                    <path stroke=\"currentColor\" stroke-width=\"2\" d=\"M5 12h14m-7 7V5\"/>
                </svg>"
            '>
                Tambah Sparepart
            </x-ui.button>

            <x-modal.form-modal id="crud-modal" title="Create Sparepart" :action="route('spareparts.store')" method="POST">

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

                <x-tables.tr>

                    <x-tables.td>
                        {{ $loop->iteration }}
                    </x-tables.td>

                    <x-tables.td class="font-medium text-heading">
                        {{ $sparepart->nama }}
                    </x-tables.td>

                    <x-tables.td>
                        {{ $sparepart->stok }}
                    </x-tables.td>

                    <x-tables.td>
                        Rp {{ number_format($sparepart->harga, 0, ',', '.') }}
                    </x-tables.td>

                    <x-tables.td class="flex gap-2">

                        <x-ui.button variant="outline" size="sm" data-modal-target="edit-modal-{{ $sparepart->id }}"
                            data-modal-toggle="edit-modal-{{ $sparepart->id }}" :icon='
                    "<svg class=\"w-4 h-4\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\">
                        <path stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\"
                        d=\"m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.017 0 0 1 2.852 0Z\"/>
                    </svg>"'>
                        Edit
                        </x-ui.button>

                        <x-modal.form-modal :id="'edit-modal-' . $sparepart->id" title="Edit Sparepart"
                            :action="route('spareparts.update', $sparepart->id)" method="PUT" icon='<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg>'>

                            <div class="space-y-4">

                                <x-forms.input name="nama" label="Nama Sparepart" :value="$sparepart->nama" required />

                                <x-forms.input name="stok" label="Stok" type="number" :value="$sparepart->stok" required />

                                <x-forms.input name="harga" label="Harga" type="number" :value="$sparepart->harga" required />

                            </div>

                        </x-modal.form-modal>

                        <x-modal-delete :id="'delete-' . $sparepart->id" :message="'Yakin hapus ' . $sparepart->nama . '?'"
                            :action="route('spareparts.destroy', $sparepart->id)" />

                    </x-tables.td>

                </x-tables.tr>

        @empty

            <tr>
                <td colspan="5" class="text-center py-6 text-neutral-tertiary">
                    Data sparepart belum tersedia
                </td>
            </tr>

        @endforelse

    </x-tables.data-table>

@endsection