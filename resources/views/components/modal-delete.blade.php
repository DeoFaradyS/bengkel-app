@props(['id', 'message', 'action'])

<!-- Tombol modal -->
<button data-modal-target="{{ $id }}" data-modal-toggle="{{ $id }}" 
    class="text-red-600 hover:underline text-sm px-4 py-2">
    Hapus
</button>

<!-- Modal -->
<div id="{{ $id }}" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white border rounded shadow p-6">

            <!-- Close button -->
            <button type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800" data-modal-hide="{{ $id }}">
                ✕
            </button>

            <!-- Message -->
            <div class="text-center">
                <h3 class="mb-4 font-medium text-gray-800">{{ $message }}</h3>
                <div class="flex justify-center gap-4">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                            Yes, delete
                        </button>
                    </form>
                    <button data-modal-hide="{{ $id }}" type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                        Cancel
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>