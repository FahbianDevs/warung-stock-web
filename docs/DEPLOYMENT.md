# Deployment Guide (Ringkas)

## 1) Requirements
- PHP 8.2+
- Composer
- Node.js (untuk build asset)
- Database: MySQL atau SQLite

## 2) Env penting
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://domainkamu.com`
- `DB_CONNECTION=mysql` (atau `sqlite`)

## 3) Steps (umum)
1. `composer install --no-dev --optimize-autoloader`
2. `php artisan key:generate`
3. `php artisan migrate --force`
4. `npm ci && npm run build`
5. `php artisan config:cache && php artisan route:cache && php artisan view:cache`
6. Pastikan permission `storage/` dan `bootstrap/cache/` writable

## 4) Scheduler & Queue (opsional)
- Scheduler: set cron menjalankan `php artisan schedule:run`
- Queue worker: `php artisan queue:work --tries=1`

## 5) Backup
- MySQL: dump harian
- SQLite: backup file `database/database.sqlite`
