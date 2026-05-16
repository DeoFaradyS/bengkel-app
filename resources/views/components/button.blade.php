@props([
    'variant' => 'default',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'iconOnly' => false,
    'disabled' => false,
    'type' => 'button',
    'href' => null,
])

@php
    $base = 'inline-flex items-center justify-center gap-2 font-medium rounded-base transition focus:ring-4 shadow-xs focus:outline-none';

    $variants = [
        'default' => 'text-white bg-brand hover:bg-brand-strong focus:ring-brand-medium',
        'danger'  => 'text-white bg-danger hover:bg-danger-strong focus:ring-danger-medium',
        'outline' => 'text-body border border-default hover:bg-neutral-secondary-soft focus:ring-neutral-medium',
        'ghost'   => 'text-body hover:bg-neutral-secondary-soft focus:ring-neutral-medium',
        'pill'    => 'text-white bg-brand rounded-full hover:bg-brand-strong focus:ring-brand-medium',
    ];

    $sizes = [
        'sm' => 'text-sm px-3 py-2',
        'md' => 'text-sm px-4 py-2.5',
        'lg' => 'text-base px-5 py-3',
    ];

    $iconSizes = [
        'sm' => 'p-2',
        'md' => 'p-2.5',
        'lg' => 'p-3',
    ];

    $classes = trim(implode(' ', [
        $base,
        $variants[$variant] ?? $variants['default'],
        $iconOnly ? ($iconSizes[$size] ?? $iconSizes['md']) : ($sizes[$size] ?? $sizes['md']),
        $disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : '',
    ]));

    $resolvedIcon  = $icon;
    $hasIconSlot   = isset($iconSlot) && $iconSlot->isNotEmpty();
    $showIcon      = $hasIconSlot || $resolvedIcon;
@endphp

@if ($href)
    <a
        href="{{ $disabled ? null : $href }}"
        aria-disabled="{{ $disabled ? 'true' : 'false' }}"
        {{ $attributes->except(['icon', 'iconPosition', 'iconOnly', 'disabled', 'href', 'type'])->merge(['class' => $classes]) }}
    >
@else
    <button
        type="{{ $type }}"
        {{ $attributes->except(['icon', 'iconPosition', 'iconOnly', 'disabled', 'href'])->merge(['class' => $classes]) }}
        @disabled($disabled)
    >
@endif

    {{-- Icon Left --}}
    @if ($showIcon && $iconPosition === 'left')
        <span class="flex items-center shrink-0">
            @if ($hasIconSlot) {{ $iconSlot }} @else {!! $resolvedIcon !!} @endif
        </span>
    @endif

    {{-- Text --}}
    @unless ($iconOnly)
        <span>{{ $slot }}</span>
    @endunless

    {{-- Icon Right --}}
    @if ($showIcon && $iconPosition === 'right')
        <span class="flex items-center shrink-0">
            @if ($hasIconSlot) {{ $iconSlot }} @else {!! $resolvedIcon !!} @endif
        </span>
    @endif

@if ($href)
    </a>
@else
    </button>
@endif