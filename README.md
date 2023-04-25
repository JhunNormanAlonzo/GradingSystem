<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Please Follow Instructions


- after downloading or cloning the project .
- make database in your server name it grading_system
- .env file in the root directory , copy the content of .env.example file and paste it in your .env file created .
- Setup your database configuration in .env file by making database connection my setup is.

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=grading_system
- DB_USERNAME=root
- DB_PASSWORD=

- dont forget to add APP_NAME="Grading System"

- you need to have composer you can download it in https://getcomposer.org/ .
- you need to have nodejs you can download it in https://nodejs.org/en .
- after install needed tools open command prompt and navigate to the project you downloaded.
- type composer install in cmd to install necessary packages.
- type npm install && npm run dev to run and embed necessary css and js tools.
- type php artisan migrate:fresh --seed . In order to make database structures. 
- type php artisan serve click the link provided in order to see it in browser.


## How to access the system (instructions)
- the default username is alonzojhunnorman@gmail.com 
- the default password is admin123 (you can check it in UserSeeder under migration/seeder folder).
## Admin
- create a teachers and students by inputing text to each input field and click save in order to save in database.

## Teacher 
- you can add grades of student by selecting the name of student, the subject and grade.
- you can edit the grade of student by clicking the edit icon in right side of table on Grading table. and click update to save.

## Student 
- you can login the student you created in order to see the results of his/her grades.



## Jhun Norman Alonzo **if you have question please contact me 09957548690**


