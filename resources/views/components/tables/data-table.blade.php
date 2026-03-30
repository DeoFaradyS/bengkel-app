<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">

        <thead class="text-sm text-body bg-neutral-secondary-soft border-b border-default">
            <tr>
                <th class="px-6 py-3 font-medium">No</th>

                {{ $header }}

            </tr>
        </thead>

        <tbody>
            {{ $slot }}
        </tbody>

    </table>
</div>