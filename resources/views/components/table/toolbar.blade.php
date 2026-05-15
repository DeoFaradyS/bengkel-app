@props([
    'placeholder'       => 'Search',
    'name'              => 'search',
    'value'             => '',
    'action'            => '',
    'filters'           => [],
    'filterLabel'       => 'Filters',
    'createUrl'         => null,
    'createLabel'       => 'Add New',
    'createModalTarget' => null,
])

@php
    $hasCreate = $createUrl || $createModalTarget;
@endphp

<div class="p-4 flex items-center justify-between gap-3">

    <x-forms.search
        :placeholder="$placeholder"
        :name="$name"
        :value="$value"
        :action="$action"
    />

    <div class="flex items-center gap-3">

        @if ($hasCreate)
            @if ($createModalTarget)
                <x-button size="sm" type="button" iconPosition="left"
                    data-modal-target="{{ $createModalTarget }}"
                    data-modal-toggle="{{ $createModalTarget }}"
                >
                    <x-slot name="iconSlot">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5v14"/>
                        </svg>
                    </x-slot>
                    {{ $createLabel }}
                </x-button>
            @else
                <x-button size="sm" :href="$createUrl" iconPosition="left">
                    <x-slot name="iconSlot">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5v14"/>
                        </svg>
                    </x-slot>
                    {{ $createLabel }}
                </x-button>
            @endif
        @endif

        @if (count($filters) > 0)
            <div class="relative">
                <button
                    id="table-filter-btn"
                    data-dropdown-toggle="table-filter-dropdown"
                    type="button"
                    class="shrink-0 inline-flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none"
                >
                    <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"/>
                    </svg>
                    {{ $filterLabel }}
                    <svg class="w-4 h-4 ms-1.5 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </button>

                <div id="table-filter-dropdown" class="z-10 hidden absolute end-0 mt-1 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-32">
                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="table-filter-btn">
                        @foreach ($filters as $filter)
                            <li>
                                <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    {{ $filter }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </div>

</div>