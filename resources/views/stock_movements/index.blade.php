@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 m-0">Riwayat Stok</h1>
        <a class="btn btn-primary btn-sm" href="{{ route('stock_movements.create') }}">Catat</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Produk</th>
                        <th>Tipe</th>
                        <th class="text-end">Qty</th>
                        <th class="text-end">Sebelum</th>
                        <th class="text-end">Sesudah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movements as $m)
                        <tr>
                            <td class="text-muted">{{ $m->happened_at?->format('Y-m-d H:i') }}</td>
                            <td>{{ $m->product?->name ?? '-' }}</td>
                            <td>{{ $m->type }}</td>
                            <td class="text-end">{{ $m->qty }}</td>
                            <td class="text-end">{{ $m->before_stock }}</td>
                            <td class="text-end">{{ $m->after_stock }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada riwayat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $movements->links() }}
    </div>
@endsection
