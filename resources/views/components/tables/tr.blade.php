<tr {{ $attributes->merge([
    'class' => 'bg-neutral-primary border-b border-default'
]) }}>
    {{ $slot }}
</tr>