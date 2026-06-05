@extends('layouts.app')

@section('content')
    @php
        $actions = '
            <a class="btn btn-primary btn-sm shadow-sm" href="' . route('products.edit', $product) . '"><i class="fas fa-pen me-2"></i>Edit</a>
            <a class="btn btn-outline-secondary btn-sm shadow-sm" href="' . route('products.index') . '"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
        ';
    @endphp

    @include('components.page-header', [
        'title' => $product->name,
        'subtitle' => 'Detail informasi produk untuk monitoring stok dan status ketersediaan.',
        'actions' => $actions,
    ])

    <div class="row g-4">
        <div class="col-xl-4 col-md-6">
            @include('components.stat-card', [
                'label' => 'Stok Saat Ini',
                'value' => $product->current_stock . ' ' . $product->unit,
                'icon' => 'fas fa-cubes',
                'borderClass' => 'border-left-primary',
                'textClass' => 'text-primary',
            ])
        </div>
        <div class="col-xl-4 col-md-6">
            @include('components.stat-card', [
                'label' => 'Minimum Stok',
                'value' => $product->min_stock . ' ' . $product->unit,
                'icon' => 'fas fa-triangle-exclamation',
                'borderClass' => 'border-left-warning',
                'textClass' => 'text-warning',
            ])
        </div>
        <div class="col-xl-4 col-md-6">
            @include('components.stat-card', [
                'label' => 'Status',
                'value' => $product->is_active ? 'Aktif' : 'Nonaktif',
                'icon' => 'fas fa-toggle-on',
                'borderClass' => 'border-left-success',
                'textClass' => 'text-success',
            ])
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-8">
            @include('components.content-card', [
                'title' => 'Informasi Produk',
                'slot' => view('products.partials.details', compact('product'))->render(),
            ])
        </div>
    </div>
@endsection
