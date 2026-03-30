@props([
    'id',
    'action',
    'method' => 'DELETE',
    'message' => 'Are you sure?',
    'confirmText' => 'Yes, delete',
    'cancelText' => 'Cancel',
])

<div
    id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center"
>

    <div class="relative p-4 w-full max-w-md">

        <div class="relative bg-white border rounded shadow p-6">

            <!-- Close button -->
            <button
                type="button"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-800"
                data-modal-hide="{{ $id }}"
            >
                ✕
            </button>


            <!-- Message -->
            <div class="text-center">

                <h3 class="mb-4 font-medium text-gray-800">
                    {{ $message }}
                </h3>


                <div class="flex justify-center gap-4">

                    <form action="{{ $action }}" method="POST">

                        @csrf
                        @method($method)

                        <button
                            type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                        >
                            {{ $confirmText }}
                        </button>

                    </form>


                    <button
                        data-modal-hide="{{ $id }}"
                        type="button"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400"
                    >
                        {{ $cancelText }}
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>