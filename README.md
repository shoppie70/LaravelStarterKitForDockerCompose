# Laravel Starter Kit for docker compose

A start kit theme for me that works with Docker made with Laravel.  
It has admin dashboard with using a `laravel-modules`.

## Usage
after clone this repository and run below command.
```bash
$ docker compose up -d
$ php artisan key:generate
$ php artisan storage:link
$ chmod -R 777 storage bootstrap/cache
$ php artisan migrate
$ php artisan db:seed
```

## Front Theme

http://localhost

## Admin Theme

http://localhost/admin

### Login information

- Email: info@example.com
- Password: password