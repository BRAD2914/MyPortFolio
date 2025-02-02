#!/bin/bash
set -eux

# Install PHP and dependencies
composer install --no-dev --prefer-dist

# Run Laravel setup
php artisan migrate --force
php artisan config:cache
php artisan route:cache

# Start Laravel
php artisan serve --host=0.0.0.0 --port=10000
