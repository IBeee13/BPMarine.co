#!/bin/bash

# Backup
cp .env .env.backup

# Pull
git pull

# Restore .env
cp .env.backup .env

# Restore build dari backup permanen
cp -r /home/u722632723/build_backup/build public/build

# Buat symlink root
ln -sf public/build build
ln -sf public/img img
ln -sf public/css css
ln -sf public/js js
ln -sf public/fonts fonts
ln -sf public/storage storage

# Symlink folder gambar
cd "public/img/Bina Pusaka"
ln -sf Aset aset
ln -sf "the maj oceanic" "The Maj Oceanic"

# Symlink file
cd Aset
ln -sf "LOGO BINA PUSAKA 2.webp" "LOGO BINA PUSAKA 2.png"
ln -sf "LOGO BINA PUSAKA 21.webp" "LOGO BINA PUSAKA 2021.webp"

cd /home/u722632723/domains/binapusakapinisi.com/public_html

# Cache
php artisan config:cache
php artisan view:clear
php artisan route:cache

echo "Deploy selesai!"