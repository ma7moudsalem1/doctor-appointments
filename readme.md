## About ConDoctor-Appointments System

Doctor-Appointments is a web application that store Appointment of the Doctor and give him notification of any new appointment and he can accept it and change date and time as he want also has option to send confirm email to the client, Tech used:

- composer
- Laravel 5.7
- Bootstrap 3
- Ajax

## Requirements

- PHP >= 7.1.3
- composer

## How To Setup Doctor-Appointments

- Clone the repo.
- Run `composer install`.
- Run `cp .env.example .env` and set database & Email credentials in .env file.
- Run `php artisan key:generate`.
- Run `php artisan migrate`.
- Run `php artisan db:seed`.
- Enjoy the system.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.
