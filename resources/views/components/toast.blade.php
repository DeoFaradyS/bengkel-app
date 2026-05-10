@props(['variant' => 'success', 'message' => null])

@php
    $message = $message
        ?? session('success', null)
        ?? session('error', null)
        ?? session('warning', null);

    $variant = session('error') ? 'error'
        : (session('warning') ? 'warning' : $variant);

    $iconClass = match($variant) {
        'error'   => 'text-fg-danger bg-danger-soft',
        'warning' => 'text-fg-warning bg-warning-soft',
        default   => 'text-fg-success bg-success-soft',
    };

    $icon = match($variant) {
        'error'   => '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>',
        'warning' => '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>',
        default   => '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>',
    };
@endphp

@if($message)
    <div id="app-toast"
        class="fixed bottom-5 end-5 z-50 flex items-center w-full max-w-sm p-4 text-body bg-neutral-primary-soft rounded-base shadow-xs border border-default"
        role="alert">

        <div class="inline-flex items-center justify-center shrink-0 w-7 h-7 rounded {{ $iconClass }}">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                {!! $icon !!}
            </svg>
        </div>

        <div class="ms-3 text-sm font-normal">{{ $message }}</div>

        <button type="button"
            class="ms-auto flex items-center justify-center text-body hover:text-heading bg-transparent border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary rounded text-sm h-8 w-8 focus:outline-none"
            data-dismiss-target="#app-toast"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
            </svg>
        </button>

    </div>

    <script>
        setTimeout(() => {
            document.getElementById('app-toast')?.remove();
        }, 4000);
    </script>
@endif