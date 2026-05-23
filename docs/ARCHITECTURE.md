# Arsitektur & Best Practice (Laravel)

## Prinsip
- `Models` fokus ke data + relasi (tipis).
- Validasi di `FormRequest`.
- Perubahan stok via `Service` (transaction + lock).
- Query kompleks di `Query scopes` / `Service` (bukan di Blade).

## Struktur folder yang scalable
- `app/Http/Controllers/*` = layer delivery (HTTP)
- `app/Http/Requests/*` = validasi & normalisasi input
- `app/Inventory/Models/*` = bounded context Inventory
- `app/Inventory/Services/*` = aturan bisnis inventory (mis. update stok)
- `resources/views/*` = Blade (UI)

## Catatan Auth
Untuk production, group route inventory sebaiknya pakai `auth` + `authorization` (Policy/Gate).
