#!/bin/bash
echo "Running from: $(pwd)" >> /tmp/deploy.log
cd /home/u722632723/domains/binapusakapinisi.com/public_html

# Backup .env
if [ -f .env ]; then
    cp .env /tmp/bpmarine.env.backup
fi

composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize:clear
php artisan optimize

# Restore .env
if [ ! -f .env ] && [ -f /tmp/bpmarine.env.backup ]; then
    cp /tmp/bpmarine.env.backup .env
fi

# Pastikan struktur storage ada
mkdir -p storage/app/public/projects/covers
mkdir -p storage/app/public/projects/gallery
mkdir -p storage/app/public/testimonials
mkdir -p storage/logs
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views

# Copy assets
cp -r public/build ./
cp -r public/js ./
cp -r public/css ./
cp -r public/fonts ./ 2>/dev/null || true
cp -r public/img ./ 2>/dev/null || true
cp -r storage/app/public/* storage/ 2>/dev/null || true

echo "Deploy done!" >> /tmp/deploy.log