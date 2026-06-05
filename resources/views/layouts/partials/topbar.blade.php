@php
    $roleLabel = auth()->user()?->role?->value ?? 'guest';
    $roleLabel = $roleLabel === 'staff' ? 'user' : $roleLabel;
@endphp

<nav class="topbar navbar navbar-expand navbar-light mb-4 static-top">
    <div class="container-fluid px-4">
        <div>
            <div class="text-uppercase text-xs fw-bold text-primary mb-1">Inventory Dashboard</div>
            <div class="page-context">{{ $topbarSubtitle ?? 'Kelola stok, produk, dan pergerakan barang dengan tampilan yang lebih terstruktur.' }}</div>
        </div>

        <div class="d-none d-md-flex align-items-center gap-3">
            <span class="badge rounded-pill text-bg-light border px-3 py-2">
                <i class="fas fa-user-shield me-2 text-primary"></i>{{ strtoupper($roleLabel) }}
            </span>
            <span class="badge rounded-pill text-bg-light border px-3 py-2">
                <i class="fas fa-calendar-day me-2 text-primary"></i>{{ now()->format('d M Y') }}
            </span>
        </div>
    </div>
</nav>
