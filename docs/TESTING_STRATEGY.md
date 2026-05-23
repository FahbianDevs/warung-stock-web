# Testing Strategy (Pest)

## Fokus tes MVP
- `StockMovementService`: aturan stok tidak minus + update stok konsisten.
- Validasi FormRequest: field wajib, tipe data, SKU unik.
- Authorization (Policy): hapus produk hanya admin.

## Jenis tes
- Feature test untuk flow HTTP (routing + validation + response).
- Unit/Service test untuk aturan bisnis (paling penting untuk inventory).

## Perintah
- `composer test`
