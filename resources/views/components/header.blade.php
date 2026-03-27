<div class="flex items-center justify-between">

    {{-- LEFT SIDE : SEARCH --}}
    <div class="w-full max-w-sm">

        <input
            type="text"
            placeholder="Cari sparepart..."
            class="w-full px-4 py-2 text-sm border border-default rounded-base focus:ring-2 focus:ring-primary focus:outline-none"
        />

    </div>


    {{-- RIGHT SIDE : ACTION BUTTON --}}
    <div class="flex items-center gap-2">

        {{-- EXPORT BUTTON --}}
        <button
            class="px-4 py-2 text-sm border border-default rounded-base hover:bg-neutral-secondary-soft transition">

            Export

        </button>


        {{-- CREATE BUTTON --}}
        <a href="{{ route('spareparts.create') }}"
           class="px-4 py-2 text-sm text-white bg-primary rounded-base hover:opacity-90 transition">

            + Tambah Sparepart

        </a>

    </div>

</div>