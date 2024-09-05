# Proyecto de la UTU

Repositorio para el proyecto.
Guia de como hacer que funcione esto despues de clonar el repositorio:
```bash
cd Programa
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm install
npm run build
```
Y ya taria pa el `php artisan serve` 

NOTA: para que el la parte del frontend se actualize mientras la vas cambiando tenes que hacer `npm run dev` para levantar el frontend estilo servidor
      o podes hacer `npm run build` cada vez que haces un cambio para que los utilize en el renderizado del frontend
