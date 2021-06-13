@auth
    @extends(Auth::check() ? 'coreui::master' : 'errors::layout')
    @section('title', config('coreui.title', __('coreui::coreui.default_title')))

    @section('body')
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg tracking-wider text-gray-500 border-r border-gray-400">
                    @yield('code')
                </div>

                <div class="ml-4 text-lg tracking-wider text-gray-500 uppercase">
                    @yield('message')
                </div>
            </div>
        </div>
    @stop
@endauth

