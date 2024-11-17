#! /bin/bash

# Instalar las dependencias
composer install
npm install

# Compilar el Frontend
npm run build

# Crear un .env local
cp .env.example .env

sed -i "s/DB_CONNECTION=/& 'mysql'/" ".env"

echo -n "Introduce el nombre de la base de datos: "
read INPUT
sed -i "s/DB_DATABASE=/& $INPUT/" ".env"

echo -n "Introduce el nombre del usuario con el cual creaste esa base de datos: "
read INPUT
sed -i "s/DB_USERNAME=/& $INPUT/" ".env"

echo -n "Introduce la contraseña del usuario con el cual creaste esa base de datos: "
read INPUT
sed -i "s/DB_PASSWORD=/& $INPUT/" ".env"

php artisan key:generate


# Crear la base de datos
php artisan migrate

# Poblar la base de datos
php artisan db:seed

