<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>SKU</th>
                <th>Kategori</th>
                <th class="text-end">Stok</th>
                <th class="text-end">Minimum</th>
                <th class="text-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>
                        <div class="fw-bold text-gray-800">{{ $product->name }}</div>
                        <a href="{{ route('products.show', $product) }}" class="small">Lihat detail</a>
                    </td>
                    <td class="text-gray-600">{{ $product->sku ?? '-' }}</td>
                    <td>{{ $product->category?->name ?? '-' }}</td>
                    <td class="text-end">{{ $product->current_stock }}</td>
                    <td class="text-end">{{ $product->min_stock }}</td>
                    <td class="text-end">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('products.edit', $product) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('products.destroy', $product) }}">
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
                    <td colspan="6" class="text-center empty-state py-4">Belum ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
