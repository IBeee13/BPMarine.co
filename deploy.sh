#!/bin/bash

# ============================================================
# deploy.sh — BPMarine Co (Hostinger hPanel)
# Jalankan: bash deploy.sh
# ============================================================

set -e

APP_DIR="/home/u722632723/domains/binapusakapinisi.com/public_html"
LOG_FILE="/tmp/bpmarine_deploy.log"

echo "=============================" >> "$LOG_FILE"
echo "Deploy started: $(date)" >> "$LOG_FILE"

cd "$APP_DIR"

# ------------------------------------------------------------
# 1. BACKUP .env
# ------------------------------------------------------------
if [ -f .env ]; then
    cp .env /tmp/bpmarine.env.backup
    echo "[OK] .env backed up" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 2. PULL LATEST CODE (uncomment jika pakai git)
# ------------------------------------------------------------
# git pull origin main

# ------------------------------------------------------------
# 3. RESTORE .env jika hilang setelah git pull
# ------------------------------------------------------------
if [ ! -f .env ] && [ -f /tmp/bpmarine.env.backup ]; then
    cp /tmp/bpmarine.env.backup .env
    echo "[OK] .env restored" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 4. INSTALL PHP DEPENDENCIES
# ------------------------------------------------------------
composer install --no-dev --optimize-autoloader --no-interaction
echo "[OK] Composer install done" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 5. BUAT SEMUA FOLDER STORAGE YANG DIBUTUHKAN
# ------------------------------------------------------------
mkdir -p storage/app/public/projects/covers
mkdir -p storage/app/public/projects/gallery
mkdir -p storage/app/public/projects/construction
mkdir -p storage/app/public/projects/construction-covers
mkdir -p storage/app/public/testimonials
mkdir -p storage/app/public/clients
mkdir -p storage/logs
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache
echo "[OK] Storage directories created" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 6. STORAGE LINK
# Hostinger tidak support symlink via PHP (exec() disabled)
# Solusi: copy file ke folder storage_link di root public_html
# URL akses: https://binapusakapinisi.com/storage_link/...
# ------------------------------------------------------------
mkdir -p storage_link
cp -r storage/app/public/. storage_link/
echo "[OK] Files copied to storage_link" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 7. PASTIKAN index.php ADA DI ROOT DAN PATH-NYA BENAR
# Hostinger document root = public_html, bukan public_html/public
# ------------------------------------------------------------
if [ ! -f index.php ]; then
    cp public/index.php ./index.php
    echo "[OK] index.php copied to root" | tee -a "$LOG_FILE"
fi

cp -r public/img ./img
cp -r storage/app/public/. storage_link/

# Pastikan path di index.php mengarah ke root (bukan ../vendor)
sed -i "s|__DIR__.'/../vendor|__DIR__.'/vendor|g" index.php
sed -i "s|__DIR__.'/../bootstrap|__DIR__.'/bootstrap|g" index.php
echo "[OK] index.php paths verified" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 8. PASTIKAN .htaccess ADA DI ROOT
# ------------------------------------------------------------
if [ ! -f .htaccess ]; then
    cp public/.htaccess ./.htaccess 2>/dev/null || cat > .htaccess << 'HTACCESS'
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>
    RewriteEngine On
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
    RewriteCond %{HTTP:x-xsrf-token} .
    RewriteRule .* - [E=HTTP_X_XSRF_TOKEN:%{HTTP:X-XSRF-Token}]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
HTACCESS
    echo "[OK] .htaccess created at root" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 9. MIGRATION
# ------------------------------------------------------------
php artisan migrate --force
echo "[OK] Migration done" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 10. CLEAR & REBUILD CACHE
# ------------------------------------------------------------
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear
php artisan optimize:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
echo "[OK] Cache rebuilt" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 11. PERMISSION
# ------------------------------------------------------------
chmod -R 755 storage bootstrap/cache storage_link
echo "[OK] Permissions set" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 12. VERIFIKASI AKHIR
# ------------------------------------------------------------
echo "" | tee -a "$LOG_FILE"
echo "=== VERIFIKASI ===" | tee -a "$LOG_FILE"
echo -n "index.php di root: " | tee -a "$LOG_FILE"
[ -f index.php ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n ".htaccess di root: " | tee -a "$LOG_FILE"
[ -f .htaccess ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n ".env di root: " | tee -a "$LOG_FILE"
[ -f .env ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "storage_link folder: " | tee -a "$LOG_FILE"
[ -d storage_link ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "APP_KEY di .env: " | tee -a "$LOG_FILE"
grep -q "APP_KEY=base64:" .env && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "KOSONG ✗ — jalankan: php artisan key:generate" | tee -a "$LOG_FILE"

echo -n "APP_DEBUG di .env: " | tee -a "$LOG_FILE"
grep -q "APP_DEBUG=false" .env && echo "false ✓" | tee -a "$LOG_FILE" || echo "PERIKSA! Pastikan APP_DEBUG=false di production" | tee -a "$LOG_FILE"

echo ""
echo "=============================" >> "$LOG_FILE"
echo "Deploy finished: $(date)" >> "$LOG_FILE"
echo ""
echo "✓ Deploy selesai! Cek log lengkap di: $LOG_FILE"