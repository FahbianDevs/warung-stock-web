# PRD Ringkas — WARUNG-WEB INVENTORY

## 1) Problem
UMKM sering mencatat stok manual, memicu salah hitung stok, restock terlambat, dan barang kedaluwarsa tidak terpantau.

## 2) Target User
- Pemilik warung/toko grosir
- Admin kasir yang input barang masuk/keluar

## 3) Goals (MVP)
1. CRUD Produk + kategori/supplier (opsional)
2. Pencatatan barang masuk/keluar/adjustment (stock movement)
3. Dashboard: stok menipis + mendekati exp
4. Auth + role dasar (Admin/Staff)

## 4) Non-goals (MVP)
- Akuntansi, multi-gudang, integrasi POS
- Forecasting advanced

## 5) User Stories (inti)
- Sebagai admin, saya bisa menambah produk dengan min stok dan unit.
- Sebagai staff, saya bisa mencatat stok masuk/keluar sehingga stok ter-update otomatis.
- Sebagai admin, saya bisa melihat daftar produk dan filter stok menipis.
- Sebagai admin, saya bisa melihat produk yang akan kedaluwarsa.

## 6) Acceptance Criteria
- Stok tidak boleh minus.
- Semua perubahan stok tercatat sebagai `stock_movements`.
- SKU unik jika diisi.

## 7) Metrics Sukses
- Penurunan kejadian stok kosong tidak terpantau.
- Waktu input stok < 30 detik per transaksi.
