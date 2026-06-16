#!/bin/bash

# ============================================================
# deploy.sh — BPMarine Co Hostinger
# Upload admin disimpan di luar Git: /home/u722632723/bpmarine_uploads
# ============================================================

set -e

APP_DIR="/home/u722632723/domains/binapusakapinisi.com/public_html"
UPLOAD_DIR="/home/u722632723/bpmarine_uploads"
LOG_FILE="/tmp/bpmarine_deploy.log"

echo "=============================" >> "$LOG_FILE"
echo "Deploy started: $(date)" >> "$LOG_FILE"

cd "$APP_DIR"

# 1. Backup .env
if [ -f .env ]; then
    cp .env /tmp/bpmarine.env.backup
    echo "[OK] .env backed up" | tee -a "$LOG_FILE"
fi

# 2. Install dependencies
composer install --no-dev --optimize-autoloader --no-interaction
echo "[OK] Composer install done" | tee -a "$LOG_FILE"

# 3. Laravel system storage
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

# 4. External upload directory
mkdir -p "$UPLOAD_DIR"
mkdir -p "$UPLOAD_DIR/projects/covers"
mkdir -p "$UPLOAD_DIR/projects/gallery"
mkdir -p "$UPLOAD_DIR/projects/construction"
mkdir -p "$UPLOAD_DIR/projects/construction-covers"
mkdir -p "$UPLOAD_DIR/projects/construction-videos"
mkdir -p "$UPLOAD_DIR/testimonials"
mkdir -p "$UPLOAD_DIR/clients"
mkdir -p "$UPLOAD_DIR/livewire-tmp"

# Jika storage_link masih folder biasa, pindahkan dulu
if [ -e storage_link ] && [ ! -L storage_link ]; then
    mv storage_link "storage_link.old-$(date +%F-%H%M%S)"
fi

# Buat ulang symlink setiap deploy
ln -sfn "$UPLOAD_DIR" storage_link

echo "[OK] storage_link symlink verified" | tee -a "$LOG_FILE"

# 5. Copy public assets ke root public_html
cp -r public/js ./js 2>/dev/null || true
cp -r public/css ./css 2>/dev/null || true
cp -r public/img ./img 2>/dev/null || true
cp -r public/build ./build 2>/dev/null || true
cp -r public/fonts ./fonts 2>/dev/null || true

echo "[OK] Assets copied to root" | tee -a "$LOG_FILE"

# 6. index.php root
if [ ! -f index.php ]; then
    cp public/index.php ./index.php
fi

sed -i "s|__DIR__.'/../vendor|__DIR__.'/vendor|g" index.php
sed -i "s|__DIR__.'/../bootstrap|__DIR__.'/bootstrap|g" index.php

echo "[OK] index.php paths verified" | tee -a "$LOG_FILE"

# 7. .htaccess root
if [ ! -f .htaccess ]; then
    cp public/.htaccess ./.htaccess 2>/dev/null || true
fi

echo "[OK] .htaccess verified" | tee -a "$LOG_FILE"

# 8. Migration
php artisan migrate --force
echo "[OK] Migration done" | tee -a "$LOG_FILE"

# 9. Cache
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

# 10. Permissions
find storage bootstrap/cache "$UPLOAD_DIR" -type d -exec chmod 755 {} \;
find storage bootstrap/cache "$UPLOAD_DIR" -type f -exec chmod 644 {} \;

echo "[OK] Permissions set" | tee -a "$LOG_FILE"

# 11. Verification
echo "" | tee -a "$LOG_FILE"
echo "=== VERIFIKASI ===" | tee -a "$LOG_FILE"

echo -n "Branch Git: " | tee -a "$LOG_FILE"
git branch --show-current | tee -a "$LOG_FILE"

echo -n "storage_link symlink: " | tee -a "$LOG_FILE"
[ -L storage_link ] && echo "ADA ✓ -> $(readlink -f storage_link)" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "Upload directory: " | tee -a "$LOG_FILE"
[ -d "$UPLOAD_DIR" ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "Jumlah file upload: " | tee -a "$LOG_FILE"
find "$UPLOAD_DIR" -type f 2>/dev/null | wc -l | tee -a "$LOG_FILE"

echo -n "Cover folder: " | tee -a "$LOG_FILE"
[ -d "$UPLOAD_DIR/projects/covers" ] && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "TIDAK ADA ✗" | tee -a "$LOG_FILE"

echo -n "APP_KEY di .env: " | tee -a "$LOG_FILE"
grep -q "APP_KEY=base64:" .env && echo "ADA ✓" | tee -a "$LOG_FILE" || echo "KOSONG ✗" | tee -a "$LOG_FILE"

echo -n "APP_DEBUG di .env: " | tee -a "$LOG_FILE"
grep -q "APP_DEBUG=false" .env && echo "false ✓" | tee -a "$LOG_FILE" || echo "PERIKSA! Pastikan APP_DEBUG=false" | tee -a "$LOG_FILE"

echo ""
echo "Deploy finished: $(date)" >> "$LOG_FILE"
echo "✓ Deploy selesai! Cek log lengkap di: $LOG_FILE"
