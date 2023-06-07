# Test Backend Inosoft 05052023

## About the project

### Project's Description

This project (repository) is a Laravel 8 based Api.
Postmant collection can be found [here](https://api.postman.com/collections/584149-81fb305a-cb5b-4eaa-9b2c-cafb1076e8a4?access_key=PMAT-01H29F9470SA80PD5NVGQG08EK).

## Prerequisites

Below is minimum requirements and instruction on how to run this project in your development environment.

### Server

1. PHP >= 8.1
2. BCMath PHP Extension.
3. Ctype PHP Extension.
4. Fileinfo PHP Extension.
5. JSON PHP Extension.
6. Mbstring PHP Extension.
7. OpenSSL PHP Extension.
8. PDO PHP Extension.
9. MySQL or MariaDB
10. Composer >= 2.4.4
11. GIT v2.37.0

### How to run the project

1. Clone the [repository](https://github.com/cariuk/test-backend-inosoft-05052020.git) to a new folder and then checkout to "
   develop" branch.
2. Run `composer install`.
3. Copy .env.example to .env.
4. Open the .env file and fill out your DB information.
5. Run `php artisan key:generate`.
6. Run `php artisan migrate:fresh --seed`.
7. Run `php artisan passport:install`.
8. To run it with Laravel server run `php artisan serve`.

### How to run the project with Docker

1. Clone the [repository](https://github.com/cariuk/test-backend-inosoft-05052020.git) to a new folder and then checkout to "
   develop" branch.
2. Copy .env.example to .env.
3. Open the .env file and fill out your DB information.
4. Run `php atinsan key:generate`.
5. Run `docker-compose up -d --build`.

### Code style

We are using
the [PSR-4 autoloading standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md),
meaning that for classes, methods, and code structure are using the standard to make the interoperability from composer
is well applied.

More information can be found [here](https://laravel.com/docs/10.x/contributions#coding-style), regarding stuffs like
PHPDoc and StyleCI.

### Commit Role

- feat
- fix
