@php
    $homeRoute = auth()->user()?->role?->value === 'admin' ? 'admin.dashboard' : 'user.dashboard';
    $navItems = [
        ['label' => 'Dashboard', 'route' => $homeRoute, 'pattern' => '*.dashboard', 'icon' => 'fas fa-chart-pie'],
        ['label' => 'Produk', 'route' => 'products.index', 'pattern' => 'products.*', 'icon' => 'fas fa-boxes-stacked', 'roles' => ['admin']],
        ['label' => 'Stok', 'route' => 'stock_movements.index', 'pattern' => 'stock_movements.*', 'icon' => 'fas fa-arrow-right-arrow-left'],
    ];
@endphp

<aside class="sb-sidebar">
    <a class="sidebar-brand" href="{{ route($homeRoute) }}" aria-label="Warung Stock">
        <span class="brand-mark">
            <i class="fas fa-store"></i>
        </span>
        <span class="brand-copy">
            <span>Warung Stock</span>
            <small>Inventory OS</small>
        </span>
    </a>

    <div class="sidebar-heading">Workspace</div>

    <ul class="nav flex-column nav-modern">
        @foreach ($navItems as $item)
            @continue(isset($item['roles']) && ! in_array(auth()->user()?->role?->value, $item['roles'], true))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs($item['pattern']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
                    <i class="{{ $item['icon'] }}"></i><span>{{ $item['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="sidebar-heading mt-4">Quick Actions</div>
    <div class="quick-action-stack">
        @if (auth()->user()?->role?->value === 'admin')
            <a href="{{ route('products.create') }}" class="quick-action">
                <i class="fas fa-plus"></i><span>Tambah produk</span>
            </a>
        @endif
        <a href="{{ route('stock_movements.create') }}" class="quick-action">
            <i class="fas fa-barcode"></i><span>Catat stok</span>
        </a>
    </div>

    <div class="sidebar-user">
        <div class="avatar">{{ strtoupper(substr(auth()->user()?->name ?? 'U', 0, 1)) }}</div>
        <div>
            <div class="fw-bold text-truncate">{{ auth()->user()?->name }}</div>
            <small>{{ strtoupper(auth()->user()?->role?->value ?? 'USER') }}</small>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-soft w-100">
            <i class="fas fa-right-from-bracket me-2"></i>Logout
        </button>
    </form>
</aside>

<nav class="mobile-nav" aria-label="Navigasi utama">
    @foreach ($navItems as $item)
        @continue(isset($item['roles']) && ! in_array(auth()->user()?->role?->value, $item['roles'], true))
        <a class="{{ request()->routeIs($item['pattern']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
            <i class="{{ $item['icon'] }}"></i>
            <span>{{ $item['label'] }}</span>
        </a>
    @endforeach
</nav>
