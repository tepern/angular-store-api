#!/usr/bin/env bash
echo "Running composer"
composer self-update --2
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Seeding"
php artisan migrate:fresh --seed

echo "Admin panel"
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"

echo "Storage Public"
php artisan storage:link

echo "Storage Images"
php artisan storage:link