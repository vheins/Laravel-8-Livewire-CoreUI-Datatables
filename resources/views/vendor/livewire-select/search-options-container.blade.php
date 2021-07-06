<div
    class="absolute top-0 left-0 mt-12 w-full z-10"

    x-show="isOpen"
>
    @if(!$emptyOptions)
        @foreach($options as $option)
            @include($searchOptionItem, [
                'option' => $option,
                'index' => $loop->index,
                'styles' => $styles,
            ])
        @endforeach
    @elseif ($isSearching)
        @include($searchNoResultsView, [
            'styles' => $styles,
        ])
    @endif
</div>
