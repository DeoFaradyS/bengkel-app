<x-layouts.dashboard title="Spareparts">
    <x-header title="Spareparts" description="Manage spareparts inventory." />

    <x-table>

        <x-slot:search>
            <x-table.toolbar placeholder="Search for sparepart" name="search" :value="request('search')"
                :action="route('admin.spareparts.index')" createLabel="Add Sparepart"
                createModalTarget="modal-create-sparepart" />
        </x-slot:search>

        <x-slot:head>
            <x-table.header :columns="['Name', 'Category', 'Brand', 'Stock', 'Price', 'Condition', 'Action']" />
        </x-slot:head>

        <x-slot:body>
            @forelse ($spareparts as $sparepart)
                    <x-table.row :index="$spareparts->firstItem() + $loop->index" :cells="[
                    $sparepart->name,
                    $sparepart->category,
                    $sparepart->brand,
                    $sparepart->stock . ' ' . $sparepart->unit,
                    'Rp ' . number_format($sparepart->price, 0, ',', '.'),
                    $sparepart->condition === 'new' ? 'Baru' : 'Bekas',
                ]"
                        :isLast="$loop->last">
                        <x-slot:action>
                            <x-table.action editModalTarget="modal-edit-sparepart" :editData="[
                    'name' => $sparepart->name,
                    'category' => $sparepart->category,
                    'part_number' => $sparepart->part_number,
                    'brand' => $sparepart->brand,
                    'stock' => $sparepart->stock,
                    'stock_minimum' => $sparepart->stock_minimum,
                    'price' => $sparepart->price,
                    'unit' => $sparepart->unit,
                    'condition' => $sparepart->condition,
                    'status' => $sparepart->status,
                    'description' => $sparepart->description,
                ]"
                                :updateRoute="route('admin.spareparts.update', $sparepart)"
                                :deleteUrl="route('admin.spareparts.destroy', $sparepart)"
                                deleteModalTarget="modal-delete-sparepart" />
                        </x-slot:action>
                    </x-table.row>
            @empty
                <x-table.empty :colspan="8" icon="sparepart" message="Belum ada sparepart yang ditambahkan." />
            @endforelse
        </x-slot:body>

        <x-slot:pagination>
            <x-table.footer :paginator="$spareparts" />
        </x-slot:pagination>

    </x-table>


    {{-- Create Sparepart Modal --}}
    <x-modal.form id="modal-create-sparepart" title="Tambah Sparepart" :action="route('admin.spareparts.store')"
        method="POST">
        <div class="flex flex-col gap-4">

            <x-forms.input label="Nama" name="name" id="create_name" placeholder="Contoh: Dinamo Starter Avanza"
                :value="old('name')" required />

            <x-forms.select id="create_category" name="category" label="Kategori" :selected="old('category')"
                :error="$errors->first('category')" :required="true" :options="[
        'Dinamo Starter' => 'Dinamo Starter',
        'Alternator' => 'Alternator',
        'Oli & Pelumas' => 'Oli & Pelumas',
        'Lainnya' => 'Lainnya',
    ]" />

            <x-forms.input label="Part Number" name="part_number" id="create_part_number"
                placeholder="Contoh: P5E1-18-400" :value="old('part_number')" />

            <x-forms.input label="Brand" name="brand" id="create_brand" placeholder="Contoh: OEM, Denso, NGK"
                :value="old('brand')" required />

            <x-forms.input label="Stok" type="number" name="stock" id="create_stock" placeholder="Contoh: 10"
                :value="old('stock')" min="0" required />

            <x-forms.input label="Stok Minimum" type="number" name="stock_minimum" id="create_stock_minimum"
                placeholder="Contoh: 3" :value="old('stock_minimum')" min="0" required />

            <x-forms.input label="Harga" type="number" name="price" id="create_price" placeholder="Contoh: 150000"
                :value="old('price')" min="0" required />

            <x-forms.select id="create_unit" name="unit" label="Satuan" :selected="old('unit', 'pcs')" :required="true"
                :options="[
        'pcs' => 'Pcs',
        'set' => 'Set',
        'liter' => 'Liter',
        'meter' => 'Meter',
    ]" />

            <x-forms.select id="create_condition" name="condition" label="Kondisi" :selected="old('condition', 'new')"
                :required="true" :options="[
        'new' => 'Baru',
        'used' => 'Bekas',
    ]" />

            <x-forms.textarea label="Deskripsi" name="description" id="create_description"
                placeholder="Contoh: Cocok untuk Toyota Avanza 2010-2015" :value="old('description')" />

        </div>
    </x-modal.form>


    {{-- Edit Sparepart Modal --}}
    <x-modal.form id="modal-edit-sparepart" title="Edit Sparepart" action="" method="PUT" submitLabel="Update">
        <div class="flex flex-col gap-4">

            <x-forms.input label="Nama" name="name" id="edit_name" placeholder="Contoh: Dinamo Starter Avanza"
                required />

            <x-forms.select id="edit_category" name="category" label="Kategori" :required="true" :options="[
        'Dinamo Starter' => 'Dinamo Starter',
        'Alternator' => 'Alternator',
        'Oli & Pelumas' => 'Oli & Pelumas',
        'Lainnya' => 'Lainnya',
    ]" />

            <x-forms.input label="Part Number" name="part_number" id="edit_part_number"
                placeholder="Contoh: P5E1-18-400" />

            <x-forms.input label="Brand" name="brand" id="edit_brand" placeholder="Contoh: OEM, Denso, NGK" required />

            <x-forms.input label="Stok" type="number" name="stock" id="edit_stock" placeholder="Contoh: 10" min="0"
                required />

            <x-forms.input label="Stok Minimum" type="number" name="stock_minimum" id="edit_stock_minimum"
                placeholder="Contoh: 3" min="0" required />

            <x-forms.input label="Harga" type="number" name="price" id="edit_price" placeholder="Contoh: 150000" min="0"
                required />

            <x-forms.select id="edit_unit" name="unit" label="Satuan" :required="true" :options="[
        'pcs' => 'Pcs',
        'set' => 'Set',
        'liter' => 'Liter',
        'meter' => 'Meter',
    ]" />

            <x-forms.select id="edit_condition" name="condition" label="Kondisi" :required="true" :options="[
        'new' => 'Baru',
        'used' => 'Bekas',
    ]" />

            <x-forms.textarea label="Deskripsi" name="description" id="edit_description"
                placeholder="Contoh: Cocok untuk Toyota Avanza 2010-2015" />

        </div>
    </x-modal.form>


    {{-- Delete Sparepart Modal --}}
    <x-modal.confirm id="modal-delete-sparepart" action=""
        message="Yakin ingin menghapus sparepart ini? Tindakan ini tidak dapat dibatalkan." />


    {{-- JS: Populate edit & delete modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Edit modal
            document.querySelectorAll('[data-edit-modal-target="modal-edit-sparepart"]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const modal = document.getElementById('modal-edit-sparepart');
                    const form = modal.querySelector('form');

                    form.action = btn.dataset.updateRoute;

                    modal.querySelector('#edit_name').value = btn.dataset.name ?? '';
                    modal.querySelector('#edit_part_number').value = btn.dataset.part_number ?? '';
                    modal.querySelector('#edit_brand').value = btn.dataset.brand ?? '';
                    modal.querySelector('#edit_stock').value = btn.dataset.stock ?? '';
                    modal.querySelector('#edit_stock_minimum').value = btn.dataset.stock_minimum ?? '';
                    modal.querySelector('#edit_price').value = btn.dataset.price ?? '';
                    modal.querySelector('#edit_description').value = btn.dataset.description ?? '';

                    modal.querySelector('#edit_category').value = btn.dataset.category ?? '';
                    modal.querySelector('#edit_unit').value = btn.dataset.unit ?? '';
                    modal.querySelector('#edit_condition').value = btn.dataset.condition ?? '';
                });
            });

            // Delete modal
            document.querySelectorAll('[data-modal-target="modal-delete-sparepart"]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const form = document.querySelector('#modal-delete-sparepart form');
                    form.action = btn.dataset.deleteUrl;
                });
            });

        });
    </script>

</x-layouts.dashboard>