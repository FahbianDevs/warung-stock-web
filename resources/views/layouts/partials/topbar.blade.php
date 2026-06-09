@php
    $roleLabel = auth()->user()?->role?->value ?? 'guest';
    $roleLabel = $roleLabel === 'staff' ? 'user' : $roleLabel;
@endphp

<nav class="topbar">
    <div class="topbar-left">
        <div>
            <div class="eyebrow">Inventory Dashboard</div>
            <div class="page-context">{{ $topbarSubtitle ?? 'Kelola stok, produk, supplier, dan pergerakan barang dengan alur kerja cepat.' }}</div>
        </div>
    </div>

    <div class="global-search" data-smart-search>
        <i class="fas fa-magnifying-glass"></i>
        <input type="search" placeholder="Cari produk, SKU, supplier..." aria-label="Cari cepat" data-smart-search-input>
        <kbd>Ctrl K</kbd>
        <div class="search-suggestions" data-smart-search-results>
            <a href="{{ route('products.index') }}">Produk dan katalog</a>
            <a href="{{ route('stock_movements.index') }}">Riwayat stok</a>
            <a href="{{ route('stock_movements.create') }}">Catat barang masuk/keluar</a>
        </div>
    </div>

    <div class="topbar-actions">
        <button class="icon-btn" type="button" data-theme-toggle aria-label="Ganti tema">
            <i class="fas fa-moon"></i>
        </button>
        <span class="status-pill d-none d-md-inline-flex">
            <i class="fas fa-user-shield"></i>{{ strtoupper($roleLabel) }}
        </span>
        <span class="status-pill d-none d-lg-inline-flex">
            <i class="fas fa-calendar-day"></i>{{ now()->format('d M Y') }}
        </span>
    </div>
</nav>
