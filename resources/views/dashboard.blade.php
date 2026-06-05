@extends('layouts.app')

@section('content')
    @php
        $actions = '
            <a class="btn btn-primary btn-sm shadow-sm" href="' . route('products.create') . '"><i class="fas fa-plus fa-sm me-2"></i>Tambah Produk</a>
            <a class="btn btn-outline-primary btn-sm shadow-sm" href="' . route('stock_movements.create') . '"><i class="fas fa-pen-to-square fa-sm me-2"></i>Catat Stok</a>
        ';
    @endphp

    @include('components.page-header', [
        'title' => 'Dashboard',
        'subtitle' => 'Ringkasan cepat untuk memantau stok menipis dan produk yang mendekati kedaluwarsa.',
        'actions' => $actions,
    ])

    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            @include('components.stat-card', [
                'label' => 'Stok Menipis',
                'value' => $lowStockProducts->count() . ' produk',
                'icon' => 'fas fa-box-open',
                'borderClass' => 'border-left-warning',
                'textClass' => 'text-warning',
            ])
        </div>
        <div class="col-xl-3 col-md-6">
            @include('components.stat-card', [
                'label' => 'Mendekati Expired',
                'value' => $expiringSoonProducts->count() . ' produk',
                'icon' => 'fas fa-calendar-xmark',
                'borderClass' => 'border-left-danger',
                'textClass' => 'text-danger',
            ])
        </div>
        <div class="col-xl-3 col-md-6">
            @include('components.stat-card', [
                'label' => 'Aksi Cepat',
                'value' => 'Input stok baru',
                'icon' => 'fas fa-warehouse',
                'borderClass' => 'border-left-primary',
                'textClass' => 'text-primary',
            ])
        </div>
        <div class="col-xl-3 col-md-6">
            @include('components.stat-card', [
                'label' => 'Monitoring',
                'value' => '30 hari ke depan',
                'icon' => 'fas fa-chart-line',
                'borderClass' => 'border-left-info',
                'textClass' => 'text-info',
            ])
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-6">
            @include('components.content-card', [
                'title' => 'Stok Menipis',
                'bodyClass' => 'card-body p-0',
                'slot' => view('dashboard.partials.low-stock-table', compact('lowStockProducts'))->render(),
            ])
        </div>

        <div class="col-xl-6">
            @include('components.content-card', [
                'title' => 'Mendekati Kedaluwarsa (30 Hari)',
                'bodyClass' => 'card-body p-0',
                'slot' => view('dashboard.partials.expiring-table', compact('expiringSoonProducts'))->render(),
            ])
        </div>
    </div>
@endsection
