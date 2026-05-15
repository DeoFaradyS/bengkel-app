<x-layouts.dashboard title="Detail Booking">

    <x-header title="Detail Booking" description="View and manage booking details" />

    <div class="bg-white rounded-xl border border-default p-6">

        <div class="space-y-3">
            <div class="flex gap-2">
                <span class="text-sm text-body w-32">Nama</span>
                <span class="text-sm font-medium text-heading">{{ $booking->user->name }}</span>
            </div>
            <div class="flex gap-2">
                <span class="text-sm text-body w-32">Email</span>
                <span class="text-sm font-medium text-heading">{{ $booking->user->email }}</span>
            </div>
            <div class="flex gap-2">
                <span class="text-sm text-body w-32">Kendaraan</span>
                <span class="text-sm font-medium text-heading">{{ ucword($booking->type) }}</span>
            </div>
            <div class="flex gap-2">
                <span class="text-sm text-body w-32">Tanggal</span>
                <span class="text-sm font-medium text-heading">{{ $booking->booking_date }}</span>
            </div>
            <div class="flex gap-2">
                <span class="text-sm text-body w-32">Jam</span>
                <span class="text-sm font-medium text-heading">{{ $booking->booking_time }}</span>
            </div>
            <div class="flex gap-2">
                <span class="text-sm text-body w-32">Keluhan</span>
                <span class="text-sm font-medium text-heading">{{ $booking->complaint }}</span>
            </div>
            <div class="flex gap-2">
                <span class="text-sm text-body w-32">Status</span>
                <span class="text-sm font-medium text-heading">{{ ucfirst($booking->status) }}</span>
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            <form action="{{ route('admin.bookings.updateStatus', [$booking->id, 'process']) }}" method="POST">
                @csrf
                @method('PATCH')
                <x-button type="submit" variant="default" size="sm">Process</x-button>
            </form>

            <form action="{{ route('admin.bookings.updateStatus', [$booking->id, 'done']) }}" method="POST">
                @csrf
                @method('PATCH')
                <x-button type="submit" variant="success" size="sm">Done</x-button>
            </form>
        </div>

    </div>

</x-layouts.dashboard>