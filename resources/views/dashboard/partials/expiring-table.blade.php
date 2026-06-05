<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>Produk</th>
                <th class="text-end">Tanggal Exp</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($expiringSoonProducts as $product)
                <tr>
                    <td>
                        <div class="fw-bold text-gray-800">{{ $product->name }}</div>
                        <a href="{{ route('products.show', $product) }}" class="small">Lihat detail</a>
                    </td>
                    <td class="text-end">
                        <span class="badge badge-soft-info rounded-pill px-3 py-2">
                            {{ optional($product->expiry_date)->format('Y-m-d') }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center empty-state py-4">Tidak ada produk yang mendekati kedaluwarsa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
