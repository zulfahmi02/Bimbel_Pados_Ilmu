# Panduan Deploy Laravel ke cPanel

## Struktur Folder di cPanel

```
~/
├── bimbel_app/              # Folder utama Laravel project
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/             # Folder public Laravel (JANGAN di sini!)
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   └── vendor/
│
└── public_html/            # Document root (isi dari folder public Laravel)
    ├── index.php
    ├── .htaccess
    ├── css/
    ├── js/
    └── storage -> ../bimbel_app/storage/app/public
```

## Langkah-langkah Deploy

### 1. Upload Project

1. Upload semua file Laravel ke folder `~/bimbel_app/`
2. Pindahkan isi folder `public/` ke `~/public_html/`
3. Hapus folder `public/` dari `~/bimbel_app/`

### 2. Edit File `public_html/index.php`

Ubah path di file `public_html/index.php`:

```php
<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../bimbel_app/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../bimbel_app/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bimbel_app/bootstrap/app.php')
    ->handleRequest(Request::capture());
```

**Perubahan yang dilakukan:**
- `__DIR__.'/../storage'` → `__DIR__.'/../bimbel_app/storage'`
- `__DIR__.'/../vendor'` → `__DIR__.'/../bimbel_app/vendor'`
- `__DIR__.'/../bootstrap/app.php'` → `__DIR__.'/../bimbel_app/bootstrap/app.php'`

### 3. Konfigurasi File `.env`

Edit file `~/bimbel_app/.env`:

```env
APP_NAME="Taman Belajar Sedjati"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_TIMEZONE=Asia/Jakarta
APP_URL=https://tamanbelajarsedjati.com

# Database
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

# Session & Cache
SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_DOMAIN=tamanbelajarsedjati.com

# Filesystem
FILESYSTEM_DISK=public

# Mail (sesuaikan dengan SMTP cPanel Anda)
MAIL_MAILER=smtp
MAIL_HOST=mail.tamanbelajarsedjati.com
MAIL_PORT=587
MAIL_USERNAME=noreply@tamanbelajarsedjati.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@tamanbelajarsedjati.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Penting:**
- Ganti `tamanbelajarsedjati.com` dengan domain Anda yang sebenarnya
- Pastikan `APP_URL` dan `SESSION_DOMAIN` sesuai dengan domain Anda
- Set `APP_DEBUG=false` untuk production
- Set `APP_ENV=production`

### 4. Set Permissions (via SSH atau File Manager)

Jika Anda punya akses SSH:

```bash
cd ~/bimbel_app

# Set permission untuk storage dan bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Jika perlu, set ownership (sesuaikan dengan user cPanel Anda)
# chown -R username:username storage
# chown -R username:username bootstrap/cache
```

Jika menggunakan File Manager cPanel:
- Klik kanan folder `storage` → Change Permissions → Set ke 775
- Klik kanan folder `bootstrap/cache` → Change Permissions → Set ke 775

### 5. Buat Symbolic Link untuk Storage

Via SSH:

```bash
cd ~/bimbel_app
php artisan storage:link
```

Atau manual via File Manager:
1. Buat folder `storage` di `public_html/`
2. Buat symbolic link dari `public_html/storage` ke `bimbel_app/storage/app/public`

### 6. Clear Cache dan Optimize

Via SSH, jalankan perintah berikut:

```bash
cd ~/bimbel_app

# Clear semua cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimize untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize Filament
php artisan filament:optimize
```

### 7. Migrate Database

```bash
cd ~/bimbel_app
php artisan migrate --force
```

**Note:** Flag `--force` diperlukan karena environment production.

### 8. Buat User Admin Filament (jika belum ada)

```bash
cd ~/bimbel_app
php artisan make:filament-user
```

## Troubleshooting

### Error: "Error while loading page" saat upload file

**Penyebab:** Livewire temporary storage tidak dikonfigurasi dengan benar.

**Solusi:**

1. Pastikan folder `storage/app/private/livewire-tmp` ada dan writable:
   ```bash
   mkdir -p ~/bimbel_app/storage/app/private/livewire-tmp
   chmod -R 775 ~/bimbel_app/storage/app/private/livewire-tmp
   ```

2. Clear cache:
   ```bash
   cd ~/bimbel_app
   php artisan config:clear
   php artisan cache:clear
   ```

### Error: "The stream or file could not be opened"

**Penyebab:** Permission issue pada folder storage.

**Solusi:**
```bash
chmod -R 775 ~/bimbel_app/storage
chmod -R 775 ~/bimbel_app/bootstrap/cache
```

### Error: "No application encryption key has been specified"

**Penyebab:** APP_KEY belum di-generate.

**Solusi:**
```bash
cd ~/bimbel_app
php artisan key:generate
```

### Assets (CSS/JS) tidak muncul

**Penyebab:** Path tidak sesuai atau symbolic link belum dibuat.

**Solusi:**

1. Pastikan `APP_URL` di `.env` benar
2. Jalankan:
   ```bash
   cd ~/bimbel_app
   php artisan storage:link
   php artisan filament:optimize
   ```

### Database Connection Error

**Penyebab:** Kredensial database salah atau database belum dibuat.

**Solusi:**

1. Buat database via cPanel → MySQL Databases
2. Buat user dan berikan privileges ke database
3. Update `.env` dengan kredensial yang benar
4. Test koneksi:
   ```bash
   cd ~/bimbel_app
   php artisan migrate:status
   ```

## Checklist Setelah Deploy

- [ ] File `.env` sudah dikonfigurasi dengan benar (APP_URL, database, dll)
- [ ] `public_html/index.php` sudah diubah path-nya
- [ ] Permissions untuk `storage/` dan `bootstrap/cache/` sudah 775
- [ ] Symbolic link `public_html/storage` sudah dibuat
- [ ] Database sudah di-migrate
- [ ] Cache sudah di-clear dan di-optimize
- [ ] User admin Filament sudah dibuat
- [ ] Website bisa diakses tanpa error
- [ ] Login ke admin panel berhasil
- [ ] Upload file berfungsi dengan baik

## Perintah Lengkap untuk Copy-Paste

Jika Anda punya akses SSH, jalankan semua perintah ini sekaligus:

```bash
cd ~/bimbel_app

# Set permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Create livewire temp directory
mkdir -p storage/app/private/livewire-tmp
chmod -R 775 storage/app/private/livewire-tmp

# Create storage link
php artisan storage:link

# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan filament:optimize

# Migrate database
php artisan migrate --force

echo "Deployment completed! Silakan test website Anda."
```

## Maintenance Mode

Untuk mengaktifkan maintenance mode saat update:

```bash
# Aktifkan maintenance mode
php artisan down --secret="bypass-token"

# Lakukan update...

# Nonaktifkan maintenance mode
php artisan up
```

Dengan secret token, Anda bisa akses website dengan URL: `https://yourdomain.com/bypass-token`
