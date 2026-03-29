<div class="flex items-center justify-between">

    {{-- LEFT SLOT --}}
    <div class="w-full max-w-sm">
        {{ $left ?? '' }}
    </div>

    {{-- RIGHT SLOT --}}
    <div class="flex items-center gap-2">
        {{ $right ?? '' }}
    </div>

</div>