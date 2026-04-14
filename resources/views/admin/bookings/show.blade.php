@extends('layouts.dashboard')

@section('title', 'Detail Booking')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-lg font-semibold mb-4">Detail Booking</h2>

    <div class="space-y-2">
        <p><strong>Nama:</strong> {{ $booking->user->name }}</p>
        <p><strong>Email:</strong> {{ $booking->user->email }}</p>
        <p><strong>Kendaraan:</strong> {{ $booking->vehicle_type }}</p>
        <p><strong>Tanggal:</strong> {{ $booking->booking_date }}</p>
        <p><strong>Jam:</strong> {{ $booking->booking_time }}</p>
        <p><strong>Keluhan:</strong> {{ $booking->complaint }}</p>
        <p><strong>Status:</strong> {{ $booking->status }}</p>
    </div>

    <div class="mt-6 flex gap-2">

        <form action="{{ route('admin.bookings.updateStatus', [$booking->id, 'process']) }}" method="POST">
            @csrf
            @method('PATCH')
            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Process
            </button>
        </form>

        <form action="{{ route('admin.bookings.updateStatus', [$booking->id, 'done']) }}" method="POST">
            @csrf
            @method('PATCH')
            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Done
            </button>
        </form>

    </div>

</div>

@endsection