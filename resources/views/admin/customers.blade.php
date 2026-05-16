<x-layouts.dashboard title="Customers">
    <x-header title="Customers" description="View all registered customers." />

    <x-table>

        <x-slot:search>
            <x-table.toolbar placeholder="Search for customer" name="search" :value="request('search')"
                :action="route('admin.customers.index')" />
        </x-slot:search>

        <x-slot:head>
            <x-table.header :columns="['Name', 'Email', 'Phone Number', 'Joined']" />
        </x-slot:head>

        <x-slot:body>
            @forelse ($users as $user)
                <x-table.row :index="$users->firstItem() + $loop->index" :cells="[
                    $user->name,
                    $user->email,
                    $user->phone_number ?? '-',
                    $user->created_at->format('d M Y'),
                ]" :isLast="$loop->last" />
            @empty
                <x-table.empty :colspan="4" icon="customer" message="Belum ada customer yang terdaftar." />
            @endforelse
        </x-slot:body>

        <x-slot:pagination>
            <x-table.footer :paginator="$users" />
        </x-slot:pagination>

    </x-table>

</x-layouts.dashboard>