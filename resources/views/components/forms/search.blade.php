@props([
    'placeholder' => 'Search...',
    'name'        => 'search',
    'value'       => '',
    'action'      => '',
])

<form action="{{ $action }}" method="GET" id="search-form-{{ $name }}">
    <label for="{{ $name }}" class="sr-only">{{ $placeholder }}</label>
    <div class="relative">

        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
            </svg>
        </div>

        <input
            type="search"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            autocomplete="off"
            class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
        />

    </div>
</form>

<script>
    (function () {
        const input = document.getElementById('{{ $name }}');
        const form  = document.getElementById('search-form-{{ $name }}');
        let timer;

        input.addEventListener('input', function () {
            clearTimeout(timer);
            timer = setTimeout(function () {
                form.submit();
            }, 400);
        });
    })();
</script>