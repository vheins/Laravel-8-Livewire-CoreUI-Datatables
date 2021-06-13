@if (\Illuminate\Support\Facades\Auth::user() !== null)
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">

            {{-- This part renders the dropdown menu item --}}
            <i class="fa fa-user-cog"></i> {{ \Illuminate\Support\Facades\Auth::user()->name }}

        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
                <strong>{{ __('coreui::coreui.settings') }}</strong>
            </div>

            {{-- You can add your dropdown menu items here --}}
            {{-- use <a class="dropdown-item"> ... </a> tags for each menu item --}}

            {{-- This part renders the logout part of the dropdown menu --}}
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('coreui::coreui.log_out') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endif
