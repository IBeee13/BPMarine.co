#!/bin/bash
echo "Running from: $(pwd)" >> /tmp/deploy.log
cd /home/u722632723/domains/binapusakapinisi.com/public_html

php artisan db:seed  # atau
mysqldump -u username -p database_name > backup.sql

# Restore .env
if [ ! -f .env ] && [ -f /tmp/bpmarine.env.backup ]; then
    cp /tmp/bpmarine.env.backup .env
fi

# Copy assets
cp -r public/build ./
cp -r public/js ./
cp -r public/css ./
cp -r public/fonts ./ 2>/dev/null || true
cp -r public/img ./ 2>/dev/null || true
cp -r storage/app/public/* storage/ 2>/dev/null || true

echo "Deploy done!" >> /tmp/deploy.log

# ============================================================
# deploy.sh — BPMarine Co (Hostinger hPanel)
# Jalankan: bash deploy.sh
# ============================================================

set -e  # Stop jika ada error

APP_DIR="/home/u722632723/domains/binapusakapinisi.com/public_html"
LOG_FILE="/tmp/bpmarine_deploy.log"

echo "=============================" >> "$LOG_FILE"
echo "Deploy started: $(date)" >> "$LOG_FILE"
echo "Running from: $(pwd)" >> "$LOG_FILE"

cd "$APP_DIR"

# ------------------------------------------------------------
# 1. BACKUP .env (jaga-jaga kalau git pull overwrite)
# ------------------------------------------------------------
if [ -f .env ]; then
    cp .env /tmp/bpmarine.env.backup
    echo "[OK] .env backed up" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 2. PULL LATEST CODE (opsional, uncomment jika pakai git pull)
# ------------------------------------------------------------
# git pull origin main

# ------------------------------------------------------------
# 3. RESTORE .env jika hilang setelah git pull
# ------------------------------------------------------------
if [ ! -f .env ] && [ -f /tmp/bpmarine.env.backup ]; then
    cp /tmp/bpmarine.env.backup .env
    echo "[OK] .env restored from backup" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 4. INSTALL PHP DEPENDENCIES
# ------------------------------------------------------------
composer install --no-dev --optimize-autoloader --no-interaction
echo "[OK] Composer install done" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 5. BUAT FOLDER STORAGE JIKA BELUM ADA
# ------------------------------------------------------------
mkdir -p storage/app/public/projects/covers
mkdir -p storage/app/public/projects/gallery
mkdir -p storage/app/public/projects/construction
mkdir -p storage/app/public/testimonials
mkdir -p storage/app/public/clients
mkdir -p storage/logs
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache
echo "[OK] Storage directories created" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 6. STORAGE LINK (manual karena exec() disabled di Hostinger)
# ------------------------------------------------------------
if [ ! -L "$APP_DIR/public/storage" ]; then
    ln -s "$APP_DIR/storage/app/public" "$APP_DIR/public/storage"
    echo "[OK] Storage symlink created" | tee -a "$LOG_FILE"
else
    echo "[SKIP] Storage symlink already exists" | tee -a "$LOG_FILE"
fi

# ------------------------------------------------------------
# 7. JALANKAN MIGRATION
# ------------------------------------------------------------
php artisan migrate --force
echo "[OK] Migration done" | tee -a "$LOG_FILE"

# ------------------------------------------------------------
# 8. CLEAR & REBUILD CACHE
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
# 9. FILAMENT — publish assets (jalankan sekali saat update)
# ------------------------------------------------------------
# php artisan filament:upgrade
# php artisan vendor:publish --tag=filament-assets --force

# ------------------------------------------------------------
# 10. PERMISSION FOLDER
# ------------------------------------------------------------
chmod -R 755 storage bootstrap/cache
echo "[OK] Permissions set" | tee -a "$LOG_FILE"

echo "=============================" >> "$LOG_FILE"
echo "Deploy finished: $(date)" >> "$LOG_FILE"
echo ""
echo "✓ Deploy selesai! Cek log di: $LOG_FILE"