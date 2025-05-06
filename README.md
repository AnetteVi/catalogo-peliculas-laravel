# Catálogo de Películas

Esta es una aplicación para gestionar un catálogo de películas. Los usuarios pueden ver las películas, filtrarlas por fecha de estreno y realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en ellas.

## Modelos

La aplicación utiliza los siguientes modelos:

- **Película (Movie)**: Modelo principal que contiene la información de cada película, como nombre, clasificación, fecha de estreno y descripción.
- **Usuario (User)**: Modelo de usuario para autenticar a los usuarios con nombre de usuario y contraseña.

## Características

- La aplicación es **responsiva** y se adapta a dispositivos móviles y de escritorio.
- Cada película tiene una imagen asociada (por lo menos una por película).
- **Operaciones CRUD**: Los usuarios pueden agregar, editar y eliminar películas del catálogo.
- **Autenticación**: Los usuarios deben iniciar sesión con un nombre de usuario y una contraseña para acceder al listado de películas.

## Modelo Entidad-Relación

- **Película**: Tiene atributos como `name`, `classification`, `release_date`, `description`, `picture`.
- **Usuario**: El modelo de usuario se encarga de la autenticación y gestión de las sesiones.

## Instrucciones para ejecutar el proyecto

1. Clona el repositorio.
2. Instala las dependencias con `composer install`.
3. Configura tu archivo `.env` con las credenciales de la base de datos.
4. Ejecuta las migraciones con `php artisan migrate`.
5. Ejecuta el servidor con `php artisan serve`.
6. Visita la aplicación en `http://localhost:8000`.

## Créditos

- Laravel
- Bootstrap



