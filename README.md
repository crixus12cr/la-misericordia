
# Prueba Tecnica Investta

Esta es la prueba del generador de citas dependiendo la categoria o cita a escoger, a continuacion les dire los pasos para instalar el proyecto.




## Versiones

 - PHP version 8.2.12
 - Node version 20.12.2
 - Composer
 - Mysql
 

## Instalacion

- composer install
- npm install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- npm run build

para arrancar el proyecto poner el siguiente comando:
- php artisan serve


## Vista Inicial

- como se va a ejecutar en un entorno local, al entrar al localhost es decir esta ruta http://127.0.0.1:8000/
se mostrara la vista de donde el paciente vera en pantalla su numero y modulo de la cita.

## Vista Solicitud de cita

- Acceder a esta url en donde podras seleccionar la categoria y se te asignara un numero de cita esta es la url http://127.0.0.1:8000/turns/create

## Vista Administrador

- Se uso la paqueteria de laravel breeze para un pequeño admin, en donde podras gestionar los turnos y actualizarles los estados, ademas podras asignar en las categorias los modulos en donde pueden ser atendidos, para acceder a esa vista es : http://127.0.0.1:8000/login

credenciales para ingresar son:

email: admin@admin.com
password: admin
