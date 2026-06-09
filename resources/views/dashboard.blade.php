@extends('layouts.app')

@section('content')
    @php
        $kpis = [
            ['label' => 'Total Produk', 'value' => number_format($totalProducts), 'icon' => 'fa-boxes-stacked', 'tone' => 'primary', 'trend' => '+12% bulan ini'],
            ['label' => 'Produk Hampir Habis', 'value' => number_format($lowStockProducts->count()), 'icon' => 'fa-triangle-exclamation', 'tone' => 'warning', 'trend' => 'Butuh restock'],
            ['label' => 'Produk Habis', 'value' => number_format($stockOutProducts), 'icon' => 'fa-circle-xmark', 'tone' => 'danger', 'trend' => 'Prioritas tinggi'],
            ['label' => 'Total Supplier', 'value' => number_format($totalSuppliers), 'icon' => 'fa-handshake', 'tone' => 'success', 'trend' => 'Kontak aktif'],
            ['label' => 'Total Transaksi', 'value' => number_format($totalTransactions), 'icon' => 'fa-receipt', 'tone' => 'primary', 'trend' => 'Semua mutasi'],
            ['label' => 'Pendapatan Bulanan', 'value' => 'Rp ' . number_format($monthlyRevenue, 0, ',', '.'), 'icon' => 'fa-chart-line', 'tone' => 'success', 'trend' => 'Dari barang keluar'],
            ['label' => 'Barang Masuk Hari Ini', 'value' => number_format($inToday), 'icon' => 'fa-arrow-down', 'tone' => 'primary', 'trend' => now()->format('d M Y')],
            ['label' => 'Barang Keluar Hari Ini', 'value' => number_format($outToday), 'icon' => 'fa-arrow-up', 'tone' => 'danger', 'trend' => now()->format('d M Y')],
        ];
    @endphp

    <section class="hero-dashboard">
        <div>
            <nav class="breadcrumb-modern" aria-label="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>/</span>
                <span>Overview</span>
            </nav>
            <h1>Inventory Command Center</h1>
            <p>Monitor stok, prediksi restock, transaksi harian, dan alert gudang dalam satu tampilan yang ringan untuk admin maupun operator.</p>
        </div>
        <div class="hero-actions">
            <a class="btn btn-ghost" href="{{ route('stock_movements.create') }}"><i class="fas fa-barcode me-2"></i>Scan / Catat Stok</a>
            <a class="btn btn-primary" href="{{ route('products.create') }}"><i class="fas fa-plus me-2"></i>Tambah Produk</a>
        </div>
    </section>

    <section class="kpi-grid">
        @foreach ($kpis as $kpi)
            <article class="metric-card tone-{{ $kpi['tone'] }}">
                <div class="metric-icon"><i class="fas {{ $kpi['icon'] }}"></i></div>
                <div>
                    <p>{{ $kpi['label'] }}</p>
                    <strong>{{ $kpi['value'] }}</strong>
                    <span><i class="fas fa-arrow-trend-up"></i>{{ $kpi['trend'] }}</span>
                </div>
            </article>
        @endforeach
    </section>

    <section class="analytics-grid">
        <article class="panel panel-large">
            <div class="panel-header">
                <div>
                    <h2>Stock Overview</h2>
                    <p>Stok masuk vs keluar tujuh hari terakhir.</p>
                </div>
                <span class="status-dot">Live</span>
            </div>
            <canvas id="stockOverviewChart" height="130"></canvas>
        </article>

        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Product Categories</h2>
                    <p>Distribusi stok per kategori.</p>
                </div>
            </div>
            <canvas id="categoryChart" height="190"></canvas>
        </article>

        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Monthly Sales</h2>
                    <p>Nilai penjualan enam bulan.</p>
                </div>
            </div>
            <canvas id="monthlySalesChart" height="170"></canvas>
        </article>

        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Top Selling Products</h2>
                    <p>Produk paling sering keluar.</p>
                </div>
            </div>
            <canvas id="topProductsChart" height="190"></canvas>
        </article>
    </section>

    <section class="ops-grid">
        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Warehouse Activity</h2>
                    <p>Heatmap aktivitas operasional.</p>
                </div>
            </div>
            <div class="activity-heatmap">
                @foreach (range(1, 35) as $cell)
                    <span style="--level: {{ (($cell * 7) % 5) + 1 }}"></span>
                @endforeach
            </div>
        </article>

        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Inventory Prediction</h2>
                    <p>Prediksi stok berisiko habis.</p>
                </div>
            </div>
            <div class="forecast-list">
                @forelse ($forecastProducts as $item)
                    <div class="forecast-item">
                        <div>
                            <strong>{{ $item['name'] }}</strong>
                            <span>Stok {{ $item['stock'] }} / min {{ $item['minimum'] }}</span>
                        </div>
                        <span class="risk-badge risk-{{ strtolower($item['risk']) }}">{{ $item['risk'] }}</span>
                    </div>
                @empty
                    <div class="empty-state py-4">Belum ada data prediksi stok.</div>
                @endforelse
            </div>
        </article>

        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Low Stock Alert</h2>
                    <p>Produk yang perlu segera ditinjau.</p>
                </div>
            </div>
            @include('dashboard.partials.low-stock-table', compact('lowStockProducts'))
        </article>

        <article class="panel">
            <div class="panel-header">
                <div>
                    <h2>Design System</h2>
                    <p>Struktur UI dan reusable components.</p>
                </div>
            </div>
            <div class="design-system-list">
                <span>Sidebar: Dashboard, Produk, Stok, Laporan, Supplier</span>
                <span>Components: Metric Card, Smart Table, Modal, Toast, Upload Dropzone</span>
                <span>UX Flow: Search -> Filter -> Quick Edit -> Confirm -> Toast</span>
                <span>Colors: Indigo, Emerald, Rose, Amber with neutral surfaces</span>
                <span>Packages: Chart.js, Alpine.js, Livewire, maatwebsite/excel, barryvdh/laravel-dompdf</span>
            </div>
        </article>
    </section>

    <button class="fab" type="button" data-bs-toggle="modal" data-bs-target="#quickActionModal" aria-label="Aksi cepat">
        <i class="fas fa-plus"></i>
    </button>

    <div class="modal fade" id="quickActionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modern-modal">
                <div class="modal-header">
                    <h5 class="modal-title">Quick Action Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body quick-menu">
                    <a href="{{ route('products.create') }}"><i class="fas fa-plus"></i>Tambah produk baru</a>
                    <a href="{{ route('stock_movements.create') }}"><i class="fas fa-arrow-right-arrow-left"></i>Catat barang masuk/keluar</a>
                    <a href="{{ route('products.index') }}"><i class="fas fa-table"></i>Buka smart table produk</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.inventoryCharts = {
            stockOverview: @json($stockOverview),
            monthlySales: @json($monthlySales),
            categories: {
                labels: @json($categoryStock->pluck('name')->values()),
                data: @json($categoryStock->pluck('products_sum_current_stock')->map(fn ($value) => (int) $value)->values()),
            },
            topProducts: {
                labels: @json($topSellingProducts->pluck('name')->values()),
                data: @json($topSellingProducts->pluck('total')->map(fn ($value) => (int) $value)->values()),
            },
        };
    </script>
@endpush
