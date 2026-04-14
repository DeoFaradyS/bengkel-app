@extends('layouts.dashboard')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">Manajemen Keuangan</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="p-4 bg-white rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Pendapatan</p>
            <h2 class="text-xl font-bold">Rp 0</h2>
        </div>

        <div class="p-4 bg-white rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Pengeluaran</p>
            <h2 class="text-xl font-bold">Rp 0</h2>
        </div>

        <div class="p-4 bg-white rounded-xl shadow">
            <p class="text-sm text-gray-500">Keuntungan</p>
            <h2 class="text-xl font-bold">Rp 0</h2>
        </div>

    </div>

</div>
@endsection