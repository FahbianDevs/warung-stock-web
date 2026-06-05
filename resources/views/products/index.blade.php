@extends('layouts.app')

@section('content')
    @php
        $actions = '<a class="btn btn-primary btn-sm shadow-sm" href="' . route('products.create') . '"><i class="fas fa-plus fa-sm me-2"></i>Tambah Produk</a>';
    @endphp

    @include('components.page-header', [
        'title' => 'Produk',
        'subtitle' => 'Kelola katalog barang, status stok, dan informasi kategori dalam satu tampilan.',
        'actions' => $actions,
    ])

    @include('components.content-card', [
        'title' => 'Daftar Produk',
        'bodyClass' => 'card-body p-0',
        'slot' => view('products.partials.table', compact('products'))->render(),
    ])

    <div class="mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection
