<x-layouts.dashboard title="Services">
    <x-header title="Services" description="Manage available services for your workshop." />

    <x-table>

        <x-slot:search>
            <x-table.toolbar placeholder="Search for service" name="search" :value="request('search')"
                :action="route('admin.services.index')" createLabel="Add Service"
                createModalTarget="modal-create-service" />
        </x-slot:search>

        <x-slot:head>
            <x-table.header :columns="['Name', 'Est. Time', 'Price Range', 'Action']" />
        </x-slot:head>

        <x-slot:body>
            @forelse ($services as $service)
                    <x-table.row :index="$services->firstItem() + $loop->index" :cells="[
                    $service->name,
                    $service->estimated_time . ' menit',
                    'Rp ' . number_format($service->price_min, 0, ',', '.') . ' - Rp ' . number_format($service->price_max, 0, ',', '.'),
                ]" :isLast="$loop->last">
                        <x-slot:action>
                            <x-table.action editModalTarget="modal-edit-service" :editData="[
                    'name' => $service->name,
                    'description' => $service->description,
                    'estimated_time' => $service->estimated_time,
                    'price_min' => $service->price_min,
                    'price_max' => $service->price_max,
                ]"
                                :updateRoute="route('admin.services.update', $service)"
                                :deleteUrl="route('admin.services.destroy', $service)"
                                deleteModalTarget="modal-delete-service" />
                        </x-slot:action>
                    </x-table.row>
            @empty
                <x-table.empty :colspan="6" icon="service" message="Belum ada service yang ditambahkan." />
            @endforelse
        </x-slot:body>

        <x-slot:pagination>
            <x-table.footer :paginator="$services" />
        </x-slot:pagination>

    </x-table>


    {{-- Create Service Modal --}}
    <x-modal.form id="modal-create-service" title="Tambah Service" :action="route('admin.services.store')"
        method="POST">
        <div class="flex flex-col gap-4">

            <x-forms.input label="Nama Service" name="name" id="create_name" placeholder="Contoh: Ganti Oli"
                :value="old('name')" required />

            <x-forms.textarea label="Deskripsi" name="description" id="create_description"
                placeholder="Contoh: Penggantian oli mesin standar" :value="old('description')" />

            <x-forms.input label="Estimasi Waktu (menit)" type="number" name="estimated_time" id="create_estimated_time"
                placeholder="Contoh: 30" :value="old('estimated_time')" min="1" required />

            <x-forms.input label="Harga Minimum" type="number" name="price_min" id="create_price_min"
                placeholder="Contoh: 50000" :value="old('price_min')" min="0" required />

            <x-forms.input label="Harga Maksimum" type="number" name="price_max" id="create_price_max"
                placeholder="Contoh: 150000" :value="old('price_max')" min="0" required />

        </div>
    </x-modal.form>


    {{-- Edit Service Modal --}}
    <x-modal.form id="modal-edit-service" title="Edit Service" action="" method="PUT" submitLabel="Update">
        <div class="flex flex-col gap-4">

            <x-forms.input label="Nama Service" name="name" id="edit_name" placeholder="Contoh: Ganti Oli" required />

            <x-forms.textarea label="Deskripsi" name="description" id="edit_description"
                placeholder="Contoh: Penggantian oli mesin standar" />

            <x-forms.input label="Estimasi Waktu (menit)" type="number" name="estimated_time" id="edit_estimated_time"
                placeholder="Contoh: 30" min="1" required />

            <x-forms.input label="Harga Minimum" type="number" name="price_min" id="edit_price_min"
                placeholder="Contoh: 50000" min="0" required />

            <x-forms.input label="Harga Maksimum" type="number" name="price_max" id="edit_price_max"
                placeholder="Contoh: 150000" min="0" required />


        </div>
    </x-modal.form>


    {{-- Delete Service Modal --}}
    <x-modal.confirm id="modal-delete-service" action=""
        message="Yakin ingin menghapus service ini? Tindakan ini tidak dapat dibatalkan." />


    {{-- JS: Populate edit & delete modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Edit modal
            document.querySelectorAll('[data-edit-modal-target="modal-edit-service"]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const modal = document.getElementById('modal-edit-service');
                    const form = modal.querySelector('form');

                    form.action = btn.dataset.updateRoute;

                    modal.querySelector('#edit_name').value = btn.dataset.name ?? '';
                    modal.querySelector('#edit_description').value = btn.dataset.description ?? '';
                    modal.querySelector('#edit_estimated_time').value = btn.dataset.estimated_time ?? '';
                    modal.querySelector('#edit_price_min').value = btn.dataset.price_min ?? '';
                    modal.querySelector('#edit_price_max').value = btn.dataset.price_max ?? '';
                });
            });

            // Delete modal
            document.querySelectorAll('[data-modal-target="modal-delete-service"]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const form = document.querySelector('#modal-delete-service form');
                    form.action = btn.dataset.deleteUrl;
                });
            });

        });
    </script>

</x-layouts.dashboard>