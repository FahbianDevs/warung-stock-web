@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 m-0">Dashboard</h1>
        <div class="d-flex gap-2">
            <a class="btn btn-primary btn-sm" href="{{ route('products.create') }}">Tambah Produk</a>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('stock_movements.create') }}">Catat Stok</a>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Stok Menipis</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-end">Stok</th>
                                <th class="text-end">Min</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lowStockProducts as $p)
                                <tr>
                                    <td>
                                        <a href="{{ route('products.show', $p) }}">{{ $p->name }}</a>
                                    </td>
                                    <td class="text-end">{{ $p->current_stock }}</td>
                                    <td class="text-end">{{ $p->min_stock }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">Aman, belum ada stok menipis.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Mendekati Kedaluwarsa (30 hari)</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-end">Exp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($expiringSoonProducts as $p)
                                <tr>
                                    <td>
                                        <a href="{{ route('products.show', $p) }}">{{ $p->name }}</a>
                                    </td>
                                    <td class="text-end">{{ optional($p->expiry_date)->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-3">Tidak ada yang mendekati kedaluwarsa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
