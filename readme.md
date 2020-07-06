## Installation

- Clone the repository
- Create a MySQL schema called laravel or change the name
- Change the .env file with your database information
- use cmd in the project directory and run the following migrations:
- composer update
- copy .env.example .env
- php artisan key:generate
- composer require ixudra/curl 
- php artisan migrate --force
- php artisan db:seed --force
- php artisan serve
