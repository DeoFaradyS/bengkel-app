@props([
    'paginator'   => null,
    'from'        => 1,
    'to'          => 10,
    'total'       => 0,
    'currentPage' => 1,
    'lastPage'    => 1,
    'links'       => [],
])

@php
    // Jika pakai Laravel paginator, override nilai manual
    if ($paginator) {
        $from        = $paginator->firstItem() ?? 0;
        $to          = $paginator->lastItem() ?? 0;
        $total       = $paginator->total();
        $currentPage = $paginator->currentPage();
        $lastPage    = $paginator->lastPage();

        // Build links dari paginator
        $links = [];
        foreach ($paginator->getUrlRange(1, $lastPage) as $page => $url) {
            $links[] = ['url' => $url, 'label' => (string) $page];
        }
    }
@endphp

<nav class="flex items-center flex-column flex-wrap md:flex-row justify-between p-4 border-t border-default-medium">
    
    {{-- Showing info --}}
    <span class="text-sm font-normal text-body mb-4 md:mb-0 block w-full md:inline md:w-auto">
        Showing
        <span class="font-semibold text-heading">{{ $from }}-{{ $to }}</span>
        of
        <span class="font-semibold text-heading">{{ number_format($total) }}</span>
    </span>

    {{-- Page Links --}}
    <ul class="flex -space-x-px text-sm">

        {{-- Previous --}}
        @if ($paginator)
            <li>
                <a
                    href="{{ $paginator->previousPageUrl() ?? '#' }}"
                    class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-9 focus:outline-none {{ !$paginator->onFirstPage() ?: 'pointer-events-none opacity-50' }}"
                >
                    Previous
                </a>
            </li>
        @endif

        {{-- Page numbers --}}
        @foreach ($links as $link)
            @php
                $isActive = (string)$link['label'] === (string)$currentPage;
                $isEllipsis = $link['label'] === '...';
            @endphp
            <li>
                <a
                    href="{{ $link['url'] }}"
                    @if($isActive) aria-current="page" @endif
                    class="flex items-center justify-center font-medium text-sm w-9 h-9 box-border border border-default-medium focus:outline-none
                        {{ $isActive
                            ? 'text-fg-brand bg-brand-softer hover:bg-brand-soft hover:text-fg-brand'
                            : 'text-body bg-neutral-secondary-medium hover:bg-neutral-tertiary-medium hover:text-heading'
                        }}"
                >
                    {{ $link['label'] }}
                </a>
            </li>
        @endforeach

        {{-- Next --}}
        @if ($paginator)
            <li>
                <a
                    href="{{ $paginator->nextPageUrl() ?? '#' }}"
                    class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-9 focus:outline-none {{ $paginator->hasMorePages() ?: 'pointer-events-none opacity-50' }}"
                >
                    Next
                </a>
            </li>
        @endif

    </ul>
</nav>