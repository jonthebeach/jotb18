# J on the Beach website

### About
This is the code for the J on the Beach 2018 event website.

This project is built with [Laravel PHP framework](https://github.com/laravel/laravel) and [Bootstrap](https://getbootstrap.com/docs/3.3/).

### Live site https://jonthebeach.com

## Features
- Easy to setup
- Simple and responsive design
- Admin panel to add speakers, talks, schedule, workshops, sponsors, etc. 

## Local development
Prerequisites:
- Install [composer](https://getcomposer.org/)
- Install latest [node LTS](https://nodejs.org/es/download/)
- Set up a mysql server

Steps:
1. [Fork](https://github.com/jonthebeach/jotb18/fork) this repo
2. Clone locally
3. run ``npm install``
4. run ``composer install``
5. create mysql database
6. Copy .env.example and rename as .env
7. Set up your database configuration in the .env file
8. run ``php artisan migrate`` to create the sql tables
9. run ``php artisan db:seed`` to add dummy data and admin user
10. run ``php artisan serve --port=XXXX`` to run a local server in the port XXXX
11. run ``php artisan watch`` to build the assests and watch the changes to them
12. Visit the url localhost:XXXX to visit the page

### Contributors
* Design: [Ángela Dini](https://www.linkedin.com/in/angeladini/)
* Web development and DevOps: [Iván Benavides](https://github.com/ivanbenavidesmatillas)
* Dictatorship, idea and whipping: [Luis Sánchez](https://github.com/lsybarguen)

### License
Project is published under the [MIT license](https://opensource.org/licenses/MIT).Feel free to clone and modify repo as you want, but don't forget to add reference to authors. 
