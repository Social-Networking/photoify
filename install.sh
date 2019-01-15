#!/bin/bash
npm install;
composer install;
mv .env.example .env;
php artisan key:generate;
npm run dev;
