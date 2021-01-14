#!/bin/sh # activate maintenance mode
php artisan down

# update source code
git pull

# update PHP dependencies
composer install --no-interaction --no-dev --prefer-dist

# --no-interaction Do not ask any interactive question
# --no-dev  Disables installation of require-dev packages.
# --prefer-dist  Forces installation from package dist even for dev versions.

# update NodeJS dependencies
npm install --production

# update database
php artisan migrate --database=mysql_migrator --force

# update resources and generate public folder
npm run production

# --force  Required to run when in production. # stop maintenance mode
php artisan up --force
