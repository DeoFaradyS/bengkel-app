@extends('layouts.admin')

@section('title', 'Booking Service')

@section('content')

    <x-layout.page-header>
        <x-slot:left>
            <x-forms.input placeholder="Cari booking..." />
        </x-slot:left>

        <x-slot:right>
            <x-ui.button variant="outline">Export</x-ui.button>
        </x-slot:right>
    </x-layout.page-header>

    <x-tables.data-table>
        <x-slot:header>
            <th>Nama</th>
            <th>Kendaraan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Aksi</th>
        </x-slot:header>

        @forelse ($bookings as $booking)
            <x-tables.tr>
                <x-tables.td>
                    {{ $loop->iteration }}
                </x-tables.td>
                <x-tables.td>{{ $booking->user->name }}</x-tables.td>
                <x-tables.td>{{ $booking->vehicle_type }}</x-tables.td>
                <x-tables.td>{{ $booking->booking_date }}</x-tables.td>
                <x-tables.td>{{ $booking->booking_time }}</x-tables.td>

                <x-tables.td>
                    {{ ucfirst($booking->status) }}
                </x-tables.td>

                <x-tables.td>
                    <a href="{{ route('admin.bookings.show', $booking->id) }}">Detail</a>
                </x-tables.td>
            </x-tables.tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-6">
                    Belum ada booking
                </td>
            </tr>
        @endforelse
    </x-tables.data-table>

@endsection