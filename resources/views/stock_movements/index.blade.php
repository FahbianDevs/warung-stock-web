@extends('layouts.app')

@section('content')
    @php
        $actions = '<a class="btn btn-primary btn-sm shadow-sm" href="' . route('stock_movements.create') . '"><i class="fas fa-plus fa-sm me-2"></i>Catat Stok</a>';
    @endphp

    @include('components.page-header', [
        'title' => 'Riwayat Stok',
        'subtitle' => 'Pantau seluruh mutasi stok masuk, keluar, dan adjustment secara kronologis.',
        'actions' => $actions,
    ])

    @include('components.content-card', [
        'title' => 'Pergerakan Stok',
        'bodyClass' => 'card-body p-0',
        'slot' => view('stock_movements.partials.table', compact('movements'))->render(),
    ])

    <div class="mt-4">
        {{ $movements->links('pagination::bootstrap-5') }}
    </div>
@endsection
