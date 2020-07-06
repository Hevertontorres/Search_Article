## Installation

- Clone the repository
- Create a MySQL schema called laravel (in my case, I did it with Wampserver and mysql port: 3308)
- use cmd in the project directory and run the following migrations:
- composer update
- copy .env.example .env
- php artisan key:generate
- composer require ixudra/curl 
- php artisan migrate --force
- php artisan db:seed --class=UsersTableSeeder --force
- php artisan serve

## Ps: if the name of the database or the port is different, you need to change the files .env and config/database with your database information
