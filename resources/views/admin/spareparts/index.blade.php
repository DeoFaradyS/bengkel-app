@extends('layouts.dashboard')

@section('title', 'Spareparts')

@section('content')

    @php
        $spareparts = collect([
            (object) [
                'id' => 1,
                'kode_produk' => 'DS-2023-001',
                'nama_produk' => 'Dinamo Starter Mitsubishi Mirage',
                'kategori' => 'Starter',
                'merek' => 'Mitsubishi',
                'tahun' => 2023,
                'mobil_tipe' => 'Mitsubishi Mirage',
                'harga' => 750000,
                'stok' => 15,
                'gambar' => null,
                'deskripsi' => 'Dinamo starter Mitsubishi Mirage',
                'jenis_produk' => 'dinamo'
            ],
            (object) [
                'id' => 2,
                'kode_produk' => 'DS-2023-002',
                'nama_produk' => 'Dinamo Starter Toyota Avanza',
                'kategori' => 'Starter',
                'merek' => 'Toyota',
                'tahun' => 2023,
                'mobil_tipe' => 'Toyota Avanza',
                'harga' => 1000000,
                'stok' => 10,
                'gambar' => null,
                'deskripsi' => 'Dinamo starter Avanza',
                'jenis_produk' => 'dinamo'
            ],
            (object) [
                'id' => 3,
                'kode_produk' => 'DS-2023-003',
                'nama_produk' => 'Dinamo Starter Honda Civic',
                'kategori' => 'Starter',
                'merek' => 'Honda',
                'tahun' => 2023,
                'mobil_tipe' => 'Honda Civic',
                'harga' => 850000,
                'stok' => 12,
                'gambar' => null,
                'deskripsi' => 'Dinamo starter Civic',
                'jenis_produk' => 'dinamo'
            ],
            (object) [
                'id' => 4,
                'kode_produk' => 'DS-2023-006',
                'nama_produk' => 'Dinamo Alternator Toyota Fortuner',
                'kategori' => 'Alternator',
                'merek' => 'Toyota',
                'tahun' => 2023,
                'mobil_tipe' => 'Toyota Fortuner',
                'harga' => 1500000,
                'stok' => 5,
                'gambar' => null,
                'deskripsi' => 'Alternator Fortuner',
                'jenis_produk' => 'dinamo'
            ],
            (object) [
                'id' => 5,
                'kode_produk' => 'SP-1810A333',
                'nama_produk' => 'Yoke Starter Mitsubishi',
                'kategori' => 'Dinamo Starter',
                'merek' => 'Mitsubishi',
                'tahun' => null,
                'mobil_tipe' => null,
                'harga' => 350000,
                'stok' => 30,
                'gambar' => null,
                'deskripsi' => 'Yoke starter Mitsubishi',
                'jenis_produk' => 'sparepart'
            ],
            (object) [
                'id' => 6,
                'kode_produk' => 'SP-2023-002',
                'nama_produk' => 'Yoke Starter Toyota Avanza',
                'kategori' => 'Dinamo Starter',
                'merek' => 'Toyota',
                'tahun' => null,
                'mobil_tipe' => null,
                'harga' => 370000,
                'stok' => 15,
                'gambar' => null,
                'deskripsi' => 'Yoke starter Avanza',
                'jenis_produk' => 'sparepart'
            ],
            (object) [
                'id' => 7,
                'kode_produk' => 'SP-2023-006',
                'nama_produk' => 'Brush Holder Toyota Fortuner',
                'kategori' => 'Dinamo Starter',
                'merek' => 'Toyota',
                'tahun' => null,
                'mobil_tipe' => null,
                'harga' => 330000,
                'stok' => 10,
                'gambar' => null,
                'deskripsi' => 'Brush holder Fortuner',
                'jenis_produk' => 'sparepart'
            ],
            (object) [
                'id' => 8,
                'kode_produk' => 'SP-2023-007',
                'nama_produk' => 'Brush Holder Honda CR-V',
                'kategori' => 'Dinamo Starter',
                'merek' => 'Honda',
                'tahun' => null,
                'mobil_tipe' => null,
                'harga' => 350000,
                'stok' => 12,
                'gambar' => null,
                'deskripsi' => 'Brush holder CR-V',
                'jenis_produk' => 'sparepart'
            ],
            (object) [
                'id' => 9,
                'kode_produk' => 'DS-2023-010',
                'nama_produk' => 'Dinamo Starter Kia Seltos',
                'kategori' => 'Starter',
                'merek' => 'Kia',
                'tahun' => 2023,
                'mobil_tipe' => 'Kia Seltos',
                'harga' => 950000,
                'stok' => 10,
                'gambar' => null,
                'deskripsi' => 'Starter Kia Seltos',
                'jenis_produk' => 'dinamo'
            ],
            (object) [
                'id' => 10,
                'kode_produk' => 'SP-2023-008',
                'nama_produk' => 'Brush Holder Isuzu D-Max',
                'kategori' => 'Dinamo Starter',
                'merek' => 'Isuzu',
                'tahun' => null,
                'mobil_tipe' => null,
                'harga' => 300000,
                'stok' => 28,
                'gambar' => null,
                'deskripsi' => 'Brush holder Isuzu',
                'jenis_produk' => 'sparepart'
            ],
        ]);
    @endphp
    <x-header.index title="Sparepart" description="">

    </x-header.index>



    <x-tables.data-table>

        <x-slot:header>
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

                <x-tables.td>
                    {{ $loop->iteration }}
                </x-tables.td>

                <x-tables.td>
                    {{ $sparepart->kode_produk }}
                </x-tables.td>

                <x-tables.td class="font-medium text-heading">
                    {{ $sparepart->nama_produk }}
                </x-tables.td>

                <x-tables.td>
                    {{ $sparepart->kategori }}
                </x-tables.td>

                <x-tables.td>
                    {{ $sparepart->merek }}
                </x-tables.td>

                <x-tables.td>
                    {{ $sparepart->mobil_tipe ?? '-' }}
                </x-tables.td>

                <x-tables.td>
                    {{ $sparepart->stok }}
                </x-tables.td>

                <x-tables.td>
                    Rp {{ number_format($sparepart->harga, 0, ',', '.') }}
                </x-tables.td>

                <x-tables.td>
                    {{ ucfirst($sparepart->jenis_produk) }}
                </x-tables.td>


                <x-tables.td class="flex gap-2">

                    <x-ui.button variant="outline" size="sm" data-modal-target="edit-modal-{{ $sparepart->id }}"
                        data-modal-toggle="edit-modal-{{ $sparepart->id }}">
                        Edit
                    </x-ui.button>


                    <button data-modal-target="delete-sparepart-{{ $sparepart->id }}"
                        data-modal-toggle="delete-sparepart-{{ $sparepart->id }}" class="text-red-600 hover:underline">
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

@endsection