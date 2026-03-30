@props([
    'id',
    'action',
    'method' => 'DELETE',

    // UX Writing defaults
    'message' => 'Hapus data ini?',
    'description' => 'Tindakan ini tidak dapat dibatalkan.',

    // Button labels
    'confirmText' => 'Hapus',
    'cancelText' => 'Batal'
])


<div
    id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-[calc(100%-1rem)] max-h-full"
>

    <div class="relative p-4 w-full max-w-md max-h-full">

        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">


            <!-- CLOSE BUTTON -->
            <button
                type="button"
                class="absolute top-3 end-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 inline-flex justify-center items-center"
                data-modal-hide="{{ $id }}"
            >

                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6"
                    />
                </svg>

                <span class="sr-only">
                    Tutup modal
                </span>

            </button>


            <!-- BODY -->
            <div class="p-4 md:p-5 text-center">


                <!-- WARNING ICON -->
                <svg
                    class="mx-auto mb-4 text-fg-disabled w-12 h-12"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>


                <!-- MESSAGE -->
                <h3 class="mb-2 text-body font-medium">
                    {{ $message }}
                </h3>


                <!-- DESCRIPTION -->
                <p class="mb-6 text-muted">
                    {{ $description }}
                </p>


                <!-- ACTION BUTTON -->
                <div class="flex items-center justify-center space-x-4">

                    <form
                        action="{{ $action }}"
                        method="POST"
                    >

                        @csrf
                        @method($method)

                        <button
                            type="submit"
                            class="text-white bg-danger border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5"
                        >
                            {{ $confirmText }}
                        </button>

                    </form>


                    <button
                        data-modal-hide="{{ $id }}"
                        type="button"
                        class="text-body bg-neutral-secondary-medium border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5"
                    >
                        {{ $cancelText }}
                    </button>

                </div>


            </div>

        </div>

    </div>

</div>