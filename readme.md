## Installation

- Clone the repository
- Update with composer update
- Create a MySQL schema called laravel or change the name
- Change the .env file with your database information
- use cmd in the project directory and run the following migrations:
+ composer require ixudra/curl 
+ php artisan migrate
+ php artisan db:seed --class=UsersTableSeeder
+ php artisan serve