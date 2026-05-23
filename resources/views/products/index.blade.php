@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 m-0">Produk</h1>
        <a class="btn btn-primary btn-sm" href="{{ route('products.create') }}">Tambah</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>SKU</th>
                        <th>Kategori</th>
                        <th class="text-end">Stok</th>
                        <th class="text-end">Min</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $p)
                        <tr>
                            <td>
                                <a href="{{ route('products.show', $p) }}">{{ $p->name }}</a>
                            </td>
                            <td class="text-muted">{{ $p->sku ?? '-' }}</td>
                            <td>{{ $p->category?->name ?? '-' }}</td>
                            <td class="text-end">{{ $p->current_stock }}</td>
                            <td class="text-end">{{ $p->min_stock }}</td>
                            <td class="text-end">
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('products.edit', $p) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('products.destroy', $p) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Hapus produk ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
