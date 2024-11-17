#! /bin/bash

# Instalar las dependencias
composer install
npm install

# Compilar el Frontend
npm run build

# Crear un .env local
cp .env.example .env
php artisan key:generate

# Crear la base de datos
php artisan migrate

# Poblar la base de datos
php artisan db:seed

