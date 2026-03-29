@props([
    'label' => null,
    'type' => 'text',
    'name' => null,
    'id' => null,
    'placeholder' => null,
    'helper' => null,
    'state' => null, // success | error
    'size' => 'md',
    'disabled' => false,
])

@php
$id = $id ?? $name;

$sizeClass = match($size) {
    'sm' => 'px-2.5 py-2 text-sm',
    'lg' => 'px-3.5 py-3 text-base',
    'xl' => 'px-4 py-3.5 text-base',
    default => 'px-3 py-2.5 text-sm'
};

$stateClass = match($state) {
    'success' => 'border-success-subtle bg-success-soft text-fg-success-strong focus:ring-success focus:border-success',
    'error' => 'border-danger-subtle bg-danger-soft text-fg-danger-strong focus:ring-danger focus:border-danger',
    default => 'border-default-medium bg-neutral-secondary-medium text-heading focus:ring-brand focus:border-brand'
};
@endphp

<div class="w-full">

    @if($label)
        <label
            for="{{ $id }}"
            class="block mb-2.5 text-sm font-medium
            {{ $state === 'error' ? 'text-fg-danger-strong' : '' }}
            {{ $state === 'success' ? 'text-fg-success-strong' : 'text-heading' }}">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        {{ $disabled ? 'disabled' : '' }}

        {{ $attributes->merge([
            'class' => "block w-full rounded-base shadow-xs border $sizeClass $stateClass placeholder:text-body"
        ]) }}
    />

    @if($helper)
        <p class="mt-2.5 text-sm
        {{ $state === 'error' ? 'text-fg-danger-strong' :
           ($state === 'success' ? 'text-fg-success-strong' : 'text-body') }}">
            {!! $helper !!}
        </p>
    @endif

</div>