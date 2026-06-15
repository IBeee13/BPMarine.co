#!/bin/bash

# ============================================================
# deploy.sh — BPMarine Co (Hostinger Shared Hosting)
# Aman untuk upload admin di storage_link
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
# 2. PULL LATEST CODE
# Catatan:
# Jika deploy.sh dijalankan manual, git pull boleh aktif.
# Jika dipanggil otomatis oleh hPanel setelah pull, biarkan tetap comment.
# ------------------------------------------------------------
# git pull origin main

# ------------------------------------------------------------
# 3. RESTORE .env jika hilang
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
# 5. PASTIKAN FOLDER SYSTEM LARAVEL ADA
# ------------------------------------------------------------
mkdir -p storage/logs
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/app/public
mkdir -p bootstrap/cache

cat > storage/app/public/.gitignore <<'GITIGNORE'
*
!.gitignore
GITIGNORE

echo "[OK] Laravel storage directories verified" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 6. PASTIKAN FOLDER UPLOAD ADMIN ADA
# Jangan hapus isi storage_link karena ini berisi gambar/video admin.
# ------------------------------------------------------------
mkdir -p storage_link
mkdir -p storage_link/projects/covers
mkdir -p storage_link/projects/gallery
mkdir -p storage_link/projects/construction
mkdir -p storage_link/projects/construction-covers
mkdir -p storage_link/projects/construction-videos
mkdir -p storage_link/testimonials
mkdir -p storage_link/clients
mkdir -p storage_link/livewire-tmp

cat > storage_link/.gitignore <<'GITIGNORE'
*
!.gitignore
GITIGNORE

echo "[OK] Upload directories verified" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 7. COPY PUBLIC ASSETS KE ROOT
# Karena document root Hostinger kamu langsung public_html.
# Ini hanya copy asset bawaan website, bukan upload admin.
# ------------------------------------------------------------
cp -r public/js ./js 2>/dev/null || true
cp -r public/css ./css 2>/dev/null || true
cp -r public/img ./img 2>/dev/null || true
cp -r public/build ./build 2>/dev/null || true
cp -r public/fonts ./fonts 2>/dev/null || true

echo "[OK] Assets copied to root" | tee -a "$LOG_FILE"

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
chmod -R 755 storage bootstrap/cache storage_link
chmod -R 755 public/storage 2>/dev/null || true

echo "[OK] Permissions set" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 13. VERIFIKASI AKHIR
# ------------------------------------------------------------
echo "" | tee -a "$LOG_FILE"
echo "=== VERIFIKASI ===" | tee -a "$LOG_FILE"

echo -n "Branch Git: " | tee -a "$LOG_FILE"
git branch --show-current | tee -a "$LOG_FILE"

echo -n "index.php di root: " | tee -a "$LOG_FILE"
[ -f index.php ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n ".htaccess di root: " | tee -a "$LOG_FILE"
[ -f .htaccess ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n ".env di root: " | tee -a "$LOG_FILE"
[ -f .env ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "storage_link folder: " | tee -a "$LOG_FILE"
[ -d storage_link ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "storage_link/projects folder: " | tee -a "$LOG_FILE"
[ -d storage_link/projects ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "Jumlah file upload di storage_link/projects: " | tee -a "$LOG_FILE"
find storage_link/projects -type f 2>/dev/null | wc -l | tee -a "$LOG_FILE"

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
