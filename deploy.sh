#!/bin/bash
cd /home/u722632723/domains/binapusakapinisi.com/public_html

composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan storage:link
php artisan migrate --force
php artisan optimize:clear
php artisan optimize

# Copy assets
cp -r public/build ./
cp -r public/js ./
cp -r public/css ./
cp -r public/img ./ 2>/dev/null || true
cp -r public/fonts ./ 2>/dev/null || true
cp -r storage/app/public/* storage/

