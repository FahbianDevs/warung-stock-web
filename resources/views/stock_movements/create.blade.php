@extends('layouts.app')

@section('content')
    @php
        $actions = '<a class="btn btn-outline-secondary btn-sm shadow-sm" href="' . route('stock_movements.index') . '"><i class="fas fa-arrow-left me-2"></i>Kembali</a>';
    @endphp

    @include('components.page-header', [
        'title' => 'Catat Pergerakan Stok',
        'subtitle' => 'Gunakan form ini untuk mencatat stok masuk, keluar, atau penyesuaian dengan rapi.',
        'actions' => $actions,
    ])

    @include('components.content-card', [
        'title' => 'Form Pergerakan Stok',
        'slot' => view('stock_movements.partials.form', compact('products'))->render(),
    ])
@endsection
