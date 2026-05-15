<x-layouts.dashboard title="Vehicles">
    <x-header title="Vehicles" description="View and manage your registered vehicles." />

    <x-table>

        <x-slot:search>
            <x-table.toolbar
                placeholder="Search for vehicle"
                name="search"
                :value="request('search')"
                :action="route('user.vehicles.index')"
                :filters="['Brand', 'Type', 'Year']"
                createLabel="Add Vehicle"
                createModalTarget="modal-create-vehicle"
            />
        </x-slot:search>

        <x-slot:head>
            <x-table.header :columns="['License Plate', 'Brand', 'Model', 'Year', 'Action']" />
        </x-slot:head>

        <x-slot:body>
            @forelse ($vehicles as $vehicle)
                <x-table.row
                    :index="$vehicles->firstItem() + $loop->index"
                    :cells="[
                        $vehicle->license_plate,
                        $vehicle->brand,
                        $vehicle->model,
                        $vehicle->year,
                    ]"
                    :isLast="$loop->last"
                >
                    <x-slot:action>
                        <x-table.action
                            editModalTarget="modal-edit-vehicle"
                            :editData="[
                                'license_plate' => $vehicle->license_plate,
                                'brand'         => $vehicle->brand,
                                'model'         => $vehicle->model,
                                'year'          => $vehicle->year,
                            ]"
                            :updateRoute="route('user.vehicles.update', $vehicle)"
                            :deleteUrl="route('user.vehicles.destroy', $vehicle)"
                            deleteModalTarget="modal-delete-vehicle"
                        />
                    </x-slot:action>
                </x-table.row>
            @empty
                <x-table.empty :colspan="7" icon="vehicle" message="Belum ada kendaraan yang ditambahkan." />
            @endforelse
        </x-slot:body>

        <x-slot:pagination>
            <x-table.footer :paginator="$vehicles" />
        </x-slot:pagination>

    </x-table>


    {{-- Create Vehicle Modal --}}
    <x-modal.form
        id="modal-create-vehicle"
        title="Tambah Kendaraan"
        :action="route('user.vehicles.store')"
        method="POST"
    >
        <div class="flex flex-col gap-4">

            <x-forms.input
                label="Plat Nomor"
                name="license_plate"
                id="create_license_plate"
                placeholder="Contoh: HB 1013 MMA"
                :value="old('license_plate')"
                required
            />

            <x-forms.input
                label="Merek"
                name="brand"
                id="create_brand"
                placeholder="Contoh: Honda"
                :value="old('brand')"
                required
            />

            <x-forms.input
                label="Model"
                name="model"
                id="create_model"
                placeholder="Contoh: CRV"
                :value="old('model')"
                required
            />

            <x-forms.input
                label="Tahun"
                type="number"
                name="year"
                id="create_year"
                placeholder="Contoh: 2023"
                :value="old('year')"
                min="1900"
                :max="date('Y')"
                required
            />

        </div>
    </x-modal.form>


   {{-- Edit Vehicle Modal --}}
<x-modal.form
    id="modal-edit-vehicle"
    title="Edit Kendaraan"
    action=""
    method="PUT"
    submitLabel="Update"
>
    <div class="flex flex-col gap-4">

        <x-forms.input
            label="Plat Nomor"
            name="license_plate"
            id="edit_license_plate"
            placeholder="Contoh: HB 1013 MMA"
            required
        />

        <x-forms.input
            label="Merek"
            name="brand"
            id="edit_brand"
            placeholder="Contoh: Honda"
            required
        />

        <x-forms.input
            label="Model"
            name="model"
            id="edit_model"
            placeholder="Contoh: CRV"
            required
        />

        <x-forms.input
            label="Tahun"
            type="number"
            name="year"
            id="edit_year"
            placeholder="Contoh: 2023"
            min="1900"
            :max="date('Y')"
            required
        />

    </div>
</x-modal.form>


    {{-- Delete Vehicle Modal --}}
    <x-modal.confirm
        id="modal-delete-vehicle"
        action=""
        message="Yakin ingin menghapus kendaraan ini? Tindakan ini tidak dapat dibatalkan."
    />


    {{-- JS: Populate edit & delete modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Edit modal
            document.querySelectorAll('[data-edit-modal-target="modal-edit-vehicle"]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const modal  = document.getElementById('modal-edit-vehicle');
                    const form   = modal.querySelector('form');
                    const select = modal.querySelector('#edit_type');

                    form.action = btn.dataset.updateRoute;

                    modal.querySelector('#edit_license_plate').value = btn.dataset.licensePlate ?? '';
                    modal.querySelector('#edit_brand').value         = btn.dataset.brand ?? '';
                    modal.querySelector('#edit_model').value         = btn.dataset.model ?? '';
                    modal.querySelector('#edit_year').value          = btn.dataset.year ?? '';
                });
            });

            // Delete modal
            document.querySelectorAll('[data-modal-target="modal-delete-vehicle"]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const form = document.querySelector('#modal-delete-vehicle form');
                    form.action = btn.dataset.deleteUrl;
                });
            });

        });
    </script>

</x-layouts.dashboard>