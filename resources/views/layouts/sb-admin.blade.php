<!doctype html>
<html lang="id">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="sb-auth-page">
        <main class="container py-5">
            <div class="row justify-content-center align-items-center min-vh-100 py-4">
                <div class="col-xl-10 col-lg-12 col-md-10">
                    @yield('content')
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
