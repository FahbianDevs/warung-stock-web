<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', 'WARUNG-WEB INVENTORY') }}</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        @vite(['resources/js/app.js'])
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">WARUNG-WEB</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stock_movements.index') }}">Riwayat Stok</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @yield('content')
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
