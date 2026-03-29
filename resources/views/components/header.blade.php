<div class="flex items-center justify-between">

    {{-- LEFT SIDE : SEARCH --}}
    <div class="w-full max-w-sm">

        <x-forms.input placeholder="Cari sparepart..." />
    </div>


    {{-- RIGHT SIDE : ACTION BUTTON --}}
    <div class="flex items-center gap-2">

        {{-- EXPORT BUTTON --}}
        <button class="px-4 py-2 text-sm border border-default rounded-base hover:bg-neutral-secondary-soft transition">

            Export

        </button>

        <!-- CREATE BUTTON  -->
        <x-modal.form-modal id="crud-modal" title="Create new product" action="{{ route('spareparts.store') }}"
            buttonText="Tambah Sparepart">

            <div class="space-y-4">

                <x-forms.input name="nama" label="Nama Sparepart" required />

                <x-forms.input name="stok" label="Stok" type="number" required />

                <x-forms.input name="harga" label="Harga" type="number" required />

            </div>

        </x-modal.form-modal>

    </div>

</div>