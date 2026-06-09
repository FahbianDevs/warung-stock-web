<!doctype html>
<html lang="id">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <div id="wrapper" class="app-shell d-flex">
            @include('layouts.partials.sidebar')

            <div class="content-shell d-flex flex-column flex-grow-1">
                @include('layouts.partials.topbar')

                <main class="content-area">
                    <div class="container-fluid px-3 px-lg-4 pb-5">
                        @include('layouts.partials.flash')
                        @yield('content')
                    </div>
                </main>

                @include('layouts.partials.footer')
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
        @stack('scripts')
    </body>
</html>
