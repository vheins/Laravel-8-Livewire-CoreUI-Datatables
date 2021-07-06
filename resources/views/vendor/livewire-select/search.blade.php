<div id="options" class="relative">

    @include($searchInputView, [
        'name' => $name,
        'placeholder' => $placeholder,
        'styles' => $styles,
    ])

    @include($searchOptionsContainer, [
        'options' => $options,
        'emptyOptions' => $emptyOptions,
        'isSearching' => $isSearching,
        'styles' => $styles,
    ])

</div>
