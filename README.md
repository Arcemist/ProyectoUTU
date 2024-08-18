# Proyecto de la UTU

Repositorio para el proyecto.
La rama principal es para los diagramas y cosas relacionadas. (Y el coso final cuando este)
Las otras ramas son para ir haciendo prototipos.

Guia de como hacer que funcione un proyecto despues de clonar el repositorio:

Frontend:
No ta hecha la guia todavia

Backend (Suponiendo SQLite):
```bash
cd laravel
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh
```
Y ya taria pa el `php artisan serve` 
