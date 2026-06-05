<div class="table-responsive">
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
            @forelse ($movements as $movement)
                <tr>
                    <td class="text-gray-600">{{ $movement->happened_at?->format('Y-m-d H:i') }}</td>
                    <td class="fw-semibold">{{ $movement->product?->name ?? '-' }}</td>
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
                    <td colspan="6" class="text-center empty-state py-4">Belum ada riwayat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
