<div class="smart-table-shell" data-smart-table>
    <div class="smart-table-toolbar">
        <div>
            <h2 class="h6 fw-bold mb-1">Stock Movement Timeline</h2>
            <p class="text-muted mb-0 small">Pantau barang masuk, keluar, adjustment, dan audit trail gudang.</p>
        </div>
        <div class="d-flex gap-2 flex-wrap justify-content-end">
            <input class="form-control" type="search" placeholder="Cari waktu, produk, tipe..." data-table-search>
            <button class="btn btn-soft btn-sm" type="button"><i class="fas fa-filter me-2"></i>Filter</button>
            <button class="btn btn-soft btn-sm" type="button"><i class="fas fa-download me-2"></i>Export</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th data-sort>Waktu</th>
                    <th data-sort>Produk</th>
                    <th data-sort>Tipe</th>
                    <th class="text-end" data-sort>Qty</th>
                    <th class="text-end" data-sort>Sebelum</th>
                    <th class="text-end" data-sort>Sesudah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movements as $movement)
                    <tr>
                        <td class="text-muted">{{ $movement->happened_at?->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="product-cell">
                                <div class="product-thumb">{{ strtoupper(substr($movement->product?->name ?? 'S', 0, 1)) }}</div>
                                <div class="fw-semibold">{{ $movement->product?->name ?? '-' }}</div>
                            </div>
                        </td>
                        <td>
                            @php
                                $badgeMap = [
                                    'in' => 'badge-soft-success',
                                    'out' => 'badge-soft-warning',
                                    'adjustment' => 'badge-soft-info',
                                ];
                            @endphp
                            <span class="badge rounded-pill px-3 py-2 {{ $badgeMap[$movement->type] ?? 'text-bg-light' }}">{{ $movement->type }}</span>
                        </td>
                        <td class="text-end">{{ $movement->qty }}</td>
                        <td class="text-end">{{ $movement->before_stock }}</td>
                        <td class="text-end fw-semibold">{{ $movement->after_stock }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center empty-state py-5">
                            <i class="fas fa-clock-rotate-left fa-2x mb-3 d-block"></i>
                            Belum ada riwayat pergerakan stok.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
