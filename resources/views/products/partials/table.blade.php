<div class="smart-table-shell" data-smart-table>
    <div class="smart-table-toolbar">
        <div>
            <h2 class="h6 fw-bold mb-1">Smart Product Table</h2>
            <p class="text-muted mb-0 small">Search realtime, sorting, bulk action, export, dan quick stock preview.</p>
        </div>
        <div class="d-flex gap-2 flex-wrap justify-content-end">
            <input class="form-control" type="search" placeholder="Cari produk, SKU, kategori..." data-table-search>
            <button class="btn btn-soft btn-sm" type="button"><i class="fas fa-file-excel me-2"></i>Excel</button>
            <button class="btn btn-soft btn-sm" type="button"><i class="fas fa-file-pdf me-2"></i>PDF</button>
            <button class="btn btn-soft btn-sm" type="button"><i class="fas fa-columns me-2"></i>Kolom</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th><input class="form-check-input" type="checkbox" aria-label="Pilih semua"></th>
                    <th data-sort>Produk</th>
                    <th data-sort>SKU</th>
                    <th data-sort>Kategori</th>
                    <th data-sort>Supplier</th>
                    <th class="text-end" data-sort>Stok</th>
                    <th class="text-end" data-sort>Minimum</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    @php
                        $statusClass = $product->current_stock <= 0 ? 'badge-soft-warning' : ($product->current_stock <= $product->min_stock ? 'badge-soft-warning' : 'badge-soft-success');
                    @endphp
                    <tr>
                        <td><input class="form-check-input" type="checkbox" aria-label="Pilih {{ $product->name }}"></td>
                        <td>
                            <div class="product-cell">
                                <div class="product-thumb">{{ strtoupper(substr($product->name, 0, 1)) }}</div>
                                <div>
                                    <div class="fw-bold">{{ $product->name }}</div>
                                    <a href="{{ route('products.show', $product) }}" class="small">Preview produk</a>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->sku ?? 'AUTO-SKU' }}</td>
                        <td>{{ $product->category?->name ?? '-' }}</td>
                        <td>{{ $product->supplier?->name ?? '-' }}</td>
                        <td class="text-end">
                            <span class="badge rounded-pill px-3 py-2 {{ $statusClass }}">{{ $product->current_stock }} {{ $product->unit }}</span>
                        </td>
                        <td class="text-end">{{ $product->min_stock }}</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <a class="btn btn-soft btn-sm" href="{{ route('products.edit', $product) }}" title="Quick edit"><i class="fas fa-pen"></i></a>
                                <button class="btn btn-soft btn-sm" type="button" title="Barcode"><i class="fas fa-barcode"></i></button>
                                <button class="btn btn-soft btn-sm" type="button" title="QR Code"><i class="fas fa-qrcode"></i></button>
                                <form class="d-inline" method="POST" action="{{ route('products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-soft btn-sm text-danger" type="submit" onclick="return confirm('Hapus produk ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center empty-state py-5">
                            <i class="fas fa-box-open fa-2x mb-3 d-block"></i>
                            Belum ada data produk. Tambahkan produk pertama untuk mulai monitoring stok.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
