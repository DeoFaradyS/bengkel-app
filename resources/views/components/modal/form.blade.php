@props([
    'id',
    'title',
    'action',
    'method',
    'submitLabel' => 'Simpan',
    'cancelLabel' => 'Cancel',
])

@php
    if (!isset($method)) {
        throw new Exception('Method prop is required in form-modal component.');
    }
@endphp

<!-- Modal -->
<div
    id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
>

    <div class="relative p-4 w-full max-w-md max-h-full">

        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">

            <!-- HEADER -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">

                <h3 class="text-lg font-medium text-heading">
                    {{ $title }}
                </h3>

                <button
                    type="button"
                    class="text-body hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 inline-flex justify-center items-center"
                    data-modal-hide="{{ $id }}"
                >
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
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
<div class="flex items-center gap-3 border-t border-default pt-4 md:pt-6 mt-4 md:mt-6">

                    <x-button type="submit">
                        {{ $submitLabel }}
                    </x-button>

                    <x-button variant="outline" type="button" data-modal-hide="{{ $id }}">
                        {{ $cancelLabel }}
                    </x-button>

                </div>

            </form>

        </div>

    </div>

</div>