#!/bin/bash
cd /home/u722632723/domains/binapusakapinisi.com/public_html

# Backup .env sebelum pull
if [ -f .env ]; then
    cp .env /tmp/bpmarine.env.backup
fi

composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan storage:link
php artisan migrate --force
php artisan optimize:clear
php artisan optimize

# Restore .env jika hilang
if [ ! -f .env ] && [ -f /tmp/bpmarine.env.backup ]; then
    cp /tmp/bpmarine.env.backup .env
fi

# Copy assets
cp -r public/build ./
cp -r public/js ./
cp -r public/css ./
cp -r public/img ./ 2>/dev/null || true
cp -r public/fonts ./ 2>/dev/null || true
cp -r storage/app/public/* storage/