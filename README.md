# WARUNG-WEB INVENTORY

Aplikasi manajemen inventaris berbasis web untuk UMKM (warung makan / toko grosir) menggunakan Laravel.

## Fitur (MVP)
- CRUD Produk
- Dashboard: stok menipis + mendekati kedaluwarsa
- Riwayat stok (barang masuk/keluar/adjustment)

## Setup lokal
1. Install dependency: `composer install`
2. Copy env: `copy .env.example .env` (Windows) atau `cp .env.example .env`
3. Generate key: `php artisan key:generate`
4. Migrasi: `php artisan migrate`
5. Seed akun admin: `php artisan db:seed --class=AdminSeeder`
6. Jalankan dev server: `php artisan serve`

## Akun admin lokal
- Email dan password admin diatur lewat `ADMIN_EMAIL` dan `ADMIN_PASSWORD` pada `.env`.
- Default contoh: `admin@warung.test` / `password123`.

## Dokumen
- `docs/PRD.md`
- `docs/ERD.mmd`
- `docs/ARCHITECTURE.md`
- `docs/ROADMAP.md`
- `docs/TRELLO_TEMPLATE.md`
- `docs/TESTING_STRATEGY.md`
- `docs/DEPLOYMENT.md`
