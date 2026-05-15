@props([
    'id'          => null,
    'name'        => null,
    'label'       => null,
    'placeholder' => 'Pilih opsi',
    'options'     => [],
    'selected'    => null,
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

    <select
        id="{{ $id }}"
        name="{{ $name ?? $id }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body'
        ]) }}
    >
        @if($placeholder)
            <option value="" disabled {{ is_null($selected) ? 'selected' : '' }}>
                {{ $placeholder }}
            </option>
        @endif

        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @if($error)
        <p class="mt-2.5 text-sm text-fg-danger-strong">{{ $error }}</p>
    @endif
</div>