#!/bin/bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan storage:link
php artisan migrate --force
php artisan optimize:clear
php artisan optimize