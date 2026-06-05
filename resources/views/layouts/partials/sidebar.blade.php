@php
    $homeRoute = auth()->user()?->role?->value === 'admin' ? 'admin.dashboard' : 'user.dashboard';
    $navItems = [
        ['label' => 'Dashboard', 'route' => $homeRoute, 'pattern' => '*.dashboard', 'icon' => 'fas fa-fw fa-tachometer-alt'],
        ['label' => 'Produk', 'route' => 'products.index', 'pattern' => 'products.*', 'icon' => 'fas fa-fw fa-boxes-stacked', 'roles' => ['admin']],
        ['label' => 'Riwayat Stok', 'route' => 'stock_movements.index', 'pattern' => 'stock_movements.*', 'icon' => 'fas fa-fw fa-arrow-right-arrow-left'],
    ];
@endphp

<aside class="sb-sidebar p-3 p-lg-4">
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-4 py-2" href="{{ route($homeRoute) }}">
        <span class="fa-stack fa-lg me-2">
            <i class="fas fa-circle fa-stack-2x text-white-50"></i>
            <i class="fas fa-store fa-stack-1x text-white"></i>
        </span>
        <span>Warung Stock</span>
    </a>

    <div class="sidebar-heading mb-2 px-2">Navigasi</div>

    <ul class="nav flex-column gap-2">
        @foreach ($navItems as $item)
            @continue(isset($item['roles']) && ! in_array(auth()->user()?->role?->value, $item['roles'], true))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs($item['pattern']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
                    <i class="{{ $item['icon'] }} me-2"></i>{{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <hr class="sidebar-divider my-4 border-white border-opacity-25">

    <div class="px-2 text-white-50 small mb-3">
        Login sebagai <span class="text-white fw-bold">{{ auth()->user()?->name }}</span>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="px-2">
        @csrf
        <button type="submit" class="btn btn-light btn-sm w-100">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </button>
    </form>
</aside>
