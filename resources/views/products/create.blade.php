@extends('layouts.app')

@section('content')
    @php
        $actions = '<a class="btn btn-outline-secondary btn-sm shadow-sm" href="' . route('products.index') . '"><i class="fas fa-arrow-left me-2"></i>Kembali</a>';
    @endphp

    @include('components.page-header', [
        'title' => 'Tambah Produk',
        'subtitle' => 'Isi informasi barang baru dengan format yang konsisten dan mudah dipelihara.',
        'actions' => $actions,
    ])

    @include('components.content-card', [
        'title' => 'Form Produk',
        'slot' => view('products.partials.form-wrapper', [
            'action' => route('products.store'),
            'method' => 'POST',
            'submitLabel' => 'Simpan Produk',
            'product' => null,
            'categories' => $categories,
            'suppliers' => $suppliers,
        ])->render(),
    ])
@endsection
