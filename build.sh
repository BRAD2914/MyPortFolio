#!/bin/bash
set -eux

# Install PHP dependencies
composer install --no-dev --prefer-dist
npm install; npm run build
# Run Laravel setup commands
php artisan migrate --force
php artisan config:cache
php artisan route:cache

# Start Laravel
php artisan serve --host=0.0.0.0 --port=10000
