@if(is_string($item))
    <li class="c-sidebar-nav-title">{{ $item }}</li>
@elseif(isset($item['submenu']))
    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            @if(isset($item['icon'])) <i class="c-sidebar-nav-icon {{ $item['fa-family'] ?? 'fas' }} fa-{{ $item['icon'] }}"></i> @endif
            {{ __($item['text']) }}
            @if(isset($item['badge']))
                <span
                    class="badge badge-{{ $item['badge']['context'] ?? 'primary' }}
                    {{ isset($item['badge']['pill']) ? 'badge-pill' : '' }}
                ">{{ $item['badge']['text'] }}</span>
            @endif
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            @each('coreui::menu-item', $item['submenu'], 'item')
        </ul>
    </li>
@elseif(isset($item['text']) && $item['href'] == "#")
    <li class="c-sidebar-nav-title">{{ $item['text'] }}</li>
@else
    <li class="c-sidebar-nav-item {{ $item['class'] }}">
        <a href="{{ $item['href'] }}"
           @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
            class="c-sidebar-nav-link"
        >
            @if(isset($item['icon'])) <i class="c-sidebar-nav-icon {{ $item['fa-family'] ?? 'fas' }} fa-{{ $item['icon'] }}"></i> @endif
            {{ __($item['text']) }}
            @if(isset($item['badge']))
                    <span
                        class="badge badge-{{ $item['badge']['context'] ?? 'primary' }}
                        {{ isset($item['badge']['pill']) ? 'badge-pill' : '' }}
                    ">{{ $item['badge']['text'] }}</span>
            @endif
        </a>
    </li>
@endif
