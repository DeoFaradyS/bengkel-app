@props([
    'editModalTarget'   => null,
    'editData'          => [],
    'updateRoute'       => null,
    'editUrl'           => null,
    'deleteUrl'         => null,
    'deleteModalTarget' => null,  // ← tambah ini
])

<td class="px-4 py-4 w-px whitespace-nowrap">
    <div class="flex items-center gap-2">

        {{-- Edit: modal trigger --}}
        @if ($editModalTarget)
            <button
                type="button"
                data-modal-target="{{ $editModalTarget }}"
                data-modal-toggle="{{ $editModalTarget }}"
                data-edit-modal-target="{{ $editModalTarget }}"
                data-update-route="{{ $updateRoute }}"
                data-license-plate="{{ $editData['license_plate'] ?? '' }}"
                data-brand="{{ $editData['brand'] ?? '' }}"
                data-model="{{ $editData['model'] ?? '' }}"
                data-year="{{ $editData['year'] ?? '' }}"
                data-type="{{ $editData['type'] ?? '' }}"
                class="inline-flex items-center gap-1.5 text-xs font-medium text-body hover:text-heading border border-default-medium hover:bg-neutral-secondary-medium rounded-base px-2.5 py-1.5 transition"
            >
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                </svg>
                Edit
            </button>

        {{-- Edit: link biasa (fallback) --}}
        @elseif ($editUrl)
            
                href="{{ $editUrl }}"
                class="inline-flex items-center gap-1.5 text-xs font-medium text-body hover:text-heading border border-default-medium hover:bg-neutral-secondary-medium rounded-base px-2.5 py-1.5 transition"
            >
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                </svg>
                Edit
            </a>
        @endif

        {{-- Delete: modal trigger --}}
        @if ($deleteUrl && $deleteModalTarget)
            <button
                type="button"
                data-modal-target="{{ $deleteModalTarget }}"
                data-modal-toggle="{{ $deleteModalTarget }}"
                data-delete-url="{{ $deleteUrl }}"
                class="inline-flex items-center gap-1.5 text-xs font-medium text-danger hover:text-danger-strong border border-danger-soft hover:bg-danger-soft rounded-base px-2.5 py-1.5 transition"
            >
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                </svg>
                Delete
            </button>

        {{-- Delete: fallback tanpa modal --}}
        @elseif ($deleteUrl)
            <form action="{{ $deleteUrl }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="inline-flex items-center gap-1.5 text-xs font-medium text-danger hover:text-danger-strong border border-danger-soft hover:bg-danger-soft rounded-base px-2.5 py-1.5 transition"
                >
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    Delete
                </button>
            </form>
        @endif

    </div>
</td>