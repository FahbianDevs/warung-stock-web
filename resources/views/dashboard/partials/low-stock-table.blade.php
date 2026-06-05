<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>Produk</th>
                <th class="text-end">Stok</th>
                <th class="text-end">Minimum</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lowStockProducts as $product)
                <tr>
                    <td>
                        <div class="fw-bold text-gray-800">{{ $product->name }}</div>
                        <a href="{{ route('products.show', $product) }}" class="small">Lihat detail</a>
                    </td>
                    <td class="text-end"><span class="badge badge-soft-warning rounded-pill px-3 py-2">{{ $product->current_stock }}</span></td>
                    <td class="text-end">{{ $product->min_stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center empty-state py-4">Aman, belum ada stok menipis.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
