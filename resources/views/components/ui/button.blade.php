@props([
    'variant' => 'default',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'iconOnly' => false,
    'disabled' => false,
    'type' => 'button'
])

@php

    $base =
        'font-medium rounded-base transition focus:ring-4 shadow-xs inline-flex items-center justify-center gap-2';

    $variants = [
        'default' => 'text-white bg-brand border border-transparent hover:bg-brand-strong focus:ring-brand-medium',

        'outline' => 'text-body bg-transparent border border-default hover:bg-neutral-secondary-soft',

        'pill' => 'text-white bg-brand rounded-full px-5 hover:bg-brand-strong focus:ring-brand-medium',

        'icon' => 'text-body bg-neutral-secondary-medium border border-default hover:bg-neutral-tertiary-medium'
    ];

    $sizes = [
        'sm' => 'text-sm px-3 py-2',
        'md' => 'text-sm px-4 py-2.5',
        'lg' => 'text-base px-5 py-3'
    ];

    $iconSizes = [
        'sm' => 'p-2',
        'md' => 'p-2.5',
        'lg' => 'p-3'
    ];

    $disabledClass = $disabled
        ? 'opacity-50 cursor-not-allowed pointer-events-none'
        : '';

@endphp

    
 
 <button
 type="{{ $type }}"
    {{ $attributes->merge([
    'class' =>
        $base . ' ' .
        ($variants[$variant] ?? $variants['default']) . ' ' .
        ($iconOnly
            ? ($iconSizes[$size] ?? $iconSizes['md'])
            : ($sizes[$size] ?? $sizes['md'])
        ) . ' ' .
        $disabledClass
]) }}
    >

    @if ($icon && $iconPosition === 'left')
        {!! $icon !!}
    @endif

@if (!$iconOnly)
    {{ $slot }}
@endif

@if ($icon && $iconPosition === 'right')
    {!! $icon !!}
@endif

</button>