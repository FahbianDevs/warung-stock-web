@extends('layouts.app')

@section('content')
    @php
        $actions = '<a class="btn btn-outline-secondary btn-sm shadow-sm" href="' . route('products.index') . '"><i class="fas fa-arrow-left me-2"></i>Kembali</a>';
    @endphp

    @include('components.page-header', [
        'title' => 'Edit Produk',
        'subtitle' => 'Perbarui informasi barang tanpa mengubah alur bisnis yang sudah ada.',
        'actions' => $actions,
    ])

    @include('components.content-card', [
        'title' => 'Form Produk',
        'slot' => view('products.partials.form-wrapper', [
            'action' => route('products.update', $product),
            'method' => 'PUT',
            'submitLabel' => 'Update Produk',
            'product' => $product,
            'categories' => $categories,
            'suppliers' => $suppliers,
        ])->render(),
    ])
@endsection
