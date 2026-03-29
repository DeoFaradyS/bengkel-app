@props([
    'id',
    'title',
    'action',
    'buttonText' => 'Tambah Data',
    'method'
])

@php
    if (!isset($method)) {
        throw new Exception('Method prop is required in form-modal component.');
    }
@endphp

<!-- Modal toggle -->
<button
    data-modal-target="{{ $id }}"
    data-modal-toggle="{{ $id }}"
    type="button"
    class="text-white bg-brand border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5"
>
    {{ $buttonText }}
</button>

<!-- Modal -->
<div id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative p-4 w-full max-w-md max-h-full">

        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">

            <!-- HEADER -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">

                <h3 class="text-lg font-medium text-heading">
                    {{ $title }}
                </h3>

                <button
                    type="button"
                    class="text-body hover:bg-neutral-tertiary rounded-base text-sm w-9 h-9 inline-flex justify-center items-center"
                    data-modal-hide="{{ $id }}"
                >
                    ✕
                </button>

            </div>

            <!-- BODY -->
            <form action="{{ $action }}" method="POST">

                @csrf

                @method($method)

                <div class="pt-4 md:pt-6">

                    {{ $slot }}

                </div>

                <!-- FOOTER -->
                <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">

                    <button
                        type="submit"
                        class="text-white bg-brand hover:bg-brand-strong border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium rounded-base text-sm px-4 py-2.5"
                    >
                        Simpan
                    </button>

                    <button
                        data-modal-hide="{{ $id }}"
                        type="button"
                        class="text-body bg-neutral-secondary-medium border border-default-medium hover:bg-neutral-tertiary-medium rounded-base text-sm px-4 py-2.5"
                    >
                        Cancel
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>