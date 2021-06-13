<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/coreui/css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/coreui/fontawesome/css/fontawesome.css') }}">

    <!-- Custom CSS -->
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.0-canary.13/tailwind.min.css" integrity="sha512-0mXZvQboEKApqdohlHGMJ/OZ09yeQa6UgZRkgG+b3t3JlcyIqvDnUMgpUm5CvlHT9HNtRm9xbRAJPlKaFCXzdQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('css')

    <title>@yield('title', config('coreui.title', __('coreui::coreui.default_title')))</title>
</head>
<body class="c-app">

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-no-transition">
    <script type="application/javascript" src="{{ asset('vendor/coreui/js/toggle_sidebar.js') }}"></script>
    <a class="c-sidebar-brand d-md-down-none" href="{{ url('/') }}">
        <div class="c-sidebar-brand-full">{!! config('coreui.logo') !!}</div>
    </a>

    <ul class="c-sidebar-nav">
        @each('coreui::menu-item', $coreUI->menu(), 'item')
    </ul>
</div>

<div class="c-wrapper">
    <header class="c-header c-header-fixed justify-content-between">
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show">
            <span id="sidebar-toggler" class="c-header-toggler-icon"></span>
        </button>
        <button class="c-header-toggler c-class-toggler mfs-3 d-lg-none" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <span class="c-header-toggler-icon"></span>
        </button>

        <ul class="mr-4 c-header-nav">
            @yield('account', View::make('coreui::account'))
        </ul>

        {{-- Only render the subheader if the current view has *any* breadcrumbs --}}
        @if(View::hasSection('breadcrumb'))
        <div class="px-3 c-subheader justify-content-between">
            <div aria-label="breadcrumb" role="navigation">
                <ol class="px-0 m-0 border-0 breadcrumb px-md-3">
                    @yield('breadcrumb')
                </ol>
            </div>
        </div>
        @endif
    </header>

    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                @yield('body')
            </div>
        </main>
    </div>

    <footer class="c-footer">
        @yield('footer', View::make('coreui::footer'))
    </footer>
</div>

@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
<!-- Perfect Scrollbar first, then CoreUI  -->
<script type="application/javascript" src="{{ asset('vendor/coreui/js/perfect-scrollbar.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui.bundle.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui-utilities.min.js') }}"></script>
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js" integrity="sha512-No22QdEJ4zlXvdQDpm6oeXcjwajpNxvnstx6NEU/5qZFysa5gsgj/bSfAFpSc9Za5LjbgQLRXyCeY53aWmk8ZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 1500,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('toast',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })
</script>

<script>
    const Popup = Swal.mixin({
        showConfirmButton: true,
        showCloseButton: false,
        timer: 3000,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('swal',({detail:{type,message}})=>{
        Popup.fire({
            icon:type,
            title:message
        })
    })
</script>

<!-- Custom JS -->
@stack('scripts')
@stack('js')
</body>
</html>
