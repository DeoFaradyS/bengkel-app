@props([
    'id'          => null,
    'name'        => null,
    'label'       => null,
    'placeholder' => null,
    'value'       => null,
    'rows'        => 4,
    'required'    => false,
    'error'       => null,
])

<div class="w-full">
    @if($label)
        <label
            for="{{ $id }}"
            class="block mb-2.5 text-sm font-medium {{ $error ? 'text-fg-danger-strong' : 'text-heading' }}"
        >
            {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif

    <textarea
        id="{{ $id }}"
        name="{{ $name ?? $id }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body' .
                ($error ? ' border-danger-subtle bg-danger-soft text-fg-danger-strong focus:ring-danger focus:border-danger' : '')
        ]) }}
    >{{ $value }}</textarea>

    @if($error)
        <p class="mt-2.5 text-sm text-fg-danger-strong">{{ $error }}</p>
    @endif
</div>