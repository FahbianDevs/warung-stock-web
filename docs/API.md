# Struktur API (Opsional / Future)

Jika nanti butuh mobile app / integrasi, endpoint REST bisa mengikuti pola berikut:

## Auth
- `POST /api/login`
- `POST /api/logout`

## Products
- `GET /api/products`
- `POST /api/products`
- `GET /api/products/{id}`
- `PUT /api/products/{id}`
- `DELETE /api/products/{id}`

## Stock Movements
- `GET /api/stock-movements`
- `POST /api/stock-movements`

Catatan best practice:
- Validasi pakai FormRequest.
- Konsistensi stok dijaga di `StockMovementService` (transaction + lock).
