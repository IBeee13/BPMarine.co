cat > /home/u722632723/domains/binapusakapinisi.com/public_html/deploy.sh << 'EOF'
#!/bin/bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan storage:link
php artisan migrate --force
php artisan optimize:clear
php artisan optimize
cp -r /home/u722632723/domains/binapusakapinisi.com/public_html/storage/app/public/* /home/u722632723/domains/binapusakapinisi.com/public_html/storage/
EOF