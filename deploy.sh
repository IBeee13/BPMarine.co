#!/bin/bash

# ============================================================
# deploy.sh — BPMarine Co (Hostinger Shared Hosting)
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

chmod +x "$APP_DIR/artisan"
echo "[OK] Artisan permission set" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 5. BUAT SEMUA FOLDER STORAGE DI public/storage
# ------------------------------------------------------------
mkdir -p public/storage/projects/covers
mkdir -p public/storage/projects/gallery
mkdir -p public/storage/projects/construction
mkdir -p public/storage/projects/construction-covers
mkdir -p public/storage/testimonials
mkdir -p public/storage/clients
mkdir -p storage/logs
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache
echo "[OK] Storage directories created" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 6. COPY ASSETS KE ROOT
# ------------------------------------------------------------
cp -r public/js ./js 2>/dev/null || true
cp -r public/css ./css 2>/dev/null || true
cp -r public/img ./img 2>/dev/null || true
cp -r public/build ./build 2>/dev/null || true
cp -r public/fonts ./fonts 2>/dev/null || true
echo "[OK] Assets copied to root" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 7. HAPUS SYMLINK LAMA JIKA ADA
# ------------------------------------------------------------
if [ -L public/storage ]; then
    rm public/storage
    mkdir -p public/storage
    echo "[OK] Symlink lama dihapus, diganti folder" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 8. PASTIKAN index.php ADA DI ROOT DAN PATH-NYA BENAR
# ------------------------------------------------------------
if [ ! -f index.php ]; then
    cp public/index.php ./index.php
    echo "[OK] index.php copied to root" | tee -a "$LOG_FILE"
fi
sed -i "s|__DIR__.'/../vendor|__DIR__.'/vendor|g" index.php
sed -i "s|__DIR__.'/../bootstrap|__DIR__.'/bootstrap|g" index.php
echo "[OK] index.php paths verified" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 9. PASTIKAN .htaccess ADA DI ROOT
# ------------------------------------------------------------
if [ ! -f .htaccess ]; then
    cp public/.htaccess ./.htaccess 2>/dev/null || true
    echo "[OK] .htaccess copied to root" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 10. MIGRATION
# ------------------------------------------------------------
php artisan migrate --force
echo "[OK] Migration done" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 11. CLEAR & REBUILD CACHE
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
# 12. PERMISSION
# ------------------------------------------------------------
chmod -R 755 storage bootstrap/cache public/storage
echo "[OK] Permissions set" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 13. VERIFIKASI AKHIR
# ------------------------------------------------------------
echo "" | tee -a "$LOG_FILE"
echo "=== VERIFIKASI ===" | tee -a "$LOG_FILE"

echo -n "index.php di root: " | tee -a "$LOG_FILE"
[ -f index.php ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n ".htaccess di root: " | tee -a "$LOG_FILE"
[ -f .htaccess ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n ".env di root: " | tee -a "$LOG_FILE"
[ -f .env ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "public/storage folder: " | tee -a "$LOG_FILE"
[ -d public/storage ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "build assets: " | tee -a "$LOG_FILE"
[ -d build ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "img folder: " | tee -a "$LOG_FILE"
[ -d img ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "APP_KEY di .env: " | tee -a "$LOG_FILE"
grep -q "APP_KEY=base64:" .env && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "KOSONG ✗ — jalankan: php artisan key:generate" | tee -a "$LOG_FILE"

echo -n "APP_DEBUG di .env: " | tee -a "$LOG_FILE"
grep -q "APP_DEBUG=false" .env && echo "false ✓" | tee -a "$LOG_FILE" || echo "PERIKSA! Pastikan APP_DEBUG=false" | tee -a "$LOG_FILE"

echo ""
echo "=============================" >> "$LOG_FILE"
echo "Deploy finished: $(date)" >> "$LOG_FILE"
echo ""
echo "✓ Deploy selesai! Cek log lengkap di: $LOG_FILE"