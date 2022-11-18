## Features

Laravel 8

Laravel-admin

## Installation

git clone  https://github.com/tepern/angular-store-api.git

cd angular-store-api

Create .env from .env.example

php composer.phar install

## Migration

php artisan migrate

## Seeding

php artisan migrate:fresh --seed

## Administrative interface 

php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"

php artisan serve

Visit http://127.0.0.1:8000/admin
