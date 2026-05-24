#!/bin/bash
cp .env .env.backup
cp -r public/build public/build.backup
git pull
cp .env.backup .env
cp -r public/build.backup public/build
php artisan config:cache
php artisan view:clear
php artisan route:cache
echo "Deploy selesai!"