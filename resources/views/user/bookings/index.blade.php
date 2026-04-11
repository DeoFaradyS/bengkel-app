@extends('layouts.user')

@section('title', 'My Booking')

@section('content')

<x-layout.page-header>
    <x-slot:left>
        <h2 class="text-xl font-semibold">My Booking</h2>
    </x-slot:left>
</x-layout.page-header>

<x-tables.data-table>
    <x-slot:header>
        <th>Kendaraan</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Keluhan</th>
        <th>Status</th>
    </x-slot:header>

    @forelse ($bookings as $booking)
        <x-tables.tr>
            <x-tables.td>{{ $booking->vehicle_type }}</x-tables.td>
            <x-tables.td>{{ $booking->booking_date }}</x-tables.td>
            <x-tables.td>{{ $booking->booking_time }}</x-tables.td>
            <x-tables.td>{{ $booking->complaint }}</x-tables.td>

            <x-tables.td>
                <span class="px-2 py-1 text-xs rounded
                    @if($booking->status == 'pending') bg-yellow-100 text-yellow-700
                    @elseif($booking->status == 'process') bg-blue-100 text-blue-700
                    @else bg-green-100 text-green-700
                    @endif
                ">
                    {{ ucfirst($booking->status) }}
                </span>
            </x-tables.td>
        </x-tables.tr>
    @empty
        <tr>
            <td colspan="5" class="text-center py-6">
                Kamu belum punya booking
            </td>
        </tr>
    @endforelse

</x-tables.data-table>

@endsection