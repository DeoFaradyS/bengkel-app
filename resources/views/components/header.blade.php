@props(['title', 'description' => null])

<div>
    <h1 class="text-xl font-semibold text-heading">{{ $title }}</h1>
    @if($description)
        <p class="text-sm text-body mt-1">{{ $description }}</p>
    @endif
</div>