<div {{ $attributes->class(['relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default']) }}>

    {{-- Search Bar Slot --}}
    @isset($search)
        {{ $search }}
    @endisset

    {{-- Table --}}
    <table class="w-full text-sm text-left rtl:text-right text-body">

        {{-- Head Slot --}}
        @isset($head)
            {{ $head }}
        @endisset

        {{-- Body Slot --}}
        <tbody>
            @isset($body)
                {{ $body }}
            @endisset
        </tbody>

    </table>

    {{-- Pagination Slot --}}
    @isset($pagination)
        {{ $pagination }}
    @endisset

</div>