@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')

<x-layout.page-header>
    <x-slot:left>
        <x-forms.input placeholder="Cari user..." />
    </x-slot:left>

    <x-slot:right>
        <x-ui.button variant="outline">Export</x-ui.button>
    </x-slot:right>
</x-layout.page-header>

<x-tables.data-table>
    <x-slot:header>
        <th class="px-6 py-3 font-medium">Nama</th>
        <th class="px-6 py-3 font-medium">Email</th>
        <th class="px-6 py-3 font-medium">Role</th>
    </x-slot:header>

    @forelse ($users as $user)
        <x-tables.tr>
            <x-tables.td>{{ $loop->iteration }}</x-tables.td>
            <x-tables.td>{{ $user->name }}</x-tables.td>
            <x-tables.td>{{ $user->email }}</x-tables.td>
            <x-tables.td>{{ $user->role }}</x-tables.td>
        </x-tables.tr>
    @empty
        <tr>
            <td colspan="5" class="text-center py-6 text-neutral-tertiary">
                Data user belum tersedia
            </td>
        </tr>
    @endforelse
</x-tables.data-table>

@endsection