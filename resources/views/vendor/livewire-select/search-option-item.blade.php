<div
    class="p-2 hover:bg-indigo-600 cursor-pointer text-sm"

    wire:click.stop="selectValue('{{ $option['value'] }}')"

    x-bind:class="{ 'bg-indigo-600 text-white font-medium': selectedIndex === {{ $index }}, 'bg-white text-gray-600': selectedIndex !== {{ $index }} }"
    x-on:mouseover="selectedIndex = {{ $index }}"
>
    {{ $option['description'] }}
</div>
