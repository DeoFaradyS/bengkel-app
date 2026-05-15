<x-layouts.dashboard title="Booking">

    <x-header title="Booking" />

    <x-tables.data-table>
        <x-slot:header>
            <th>No</th>
            <th>Nama</th>
            <th>Kendaraan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Aksi</th>
        </x-slot:header>

        @forelse ($bookings as $booking)
            <x-tables.tr>
                <x-tables.td>{{ $loop->iteration }}</x-tables.td>
                <x-tables.td>{{ $booking->user->name }}</x-tables.td>
                <x-tables.td>{{ ucfirst($booking->type) }}</x-tables.td>
                <x-tables.td>{{ $booking->booking_date }}</x-tables.td>
                <x-tables.td>{{ $booking->booking_time }}</x-tables.td>
                <x-tables.td>{{ ucfirst($booking->status) }}</x-tables.td>
                <x-tables.td>
                    <a href="{{ route('admin.bookings.show', $booking->id) }}"
                        class="text-sm text-blue-600 hover:underline">
                        Detail
                    </a>
                </x-tables.td>
            </x-tables.tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-6 text-neutral-tertiary">
                    Belum ada booking
                </td>
            </tr>
        @endforelse
    </x-tables.data-table>

</x-layouts.dashboard>