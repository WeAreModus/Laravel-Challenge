<p align="center"><img src="https://modus-bucket.s3.amazonaws.com/modus-branding-red-log-white-text.png" width="400"></p>

# Laravel Challenge

## Pre-requisites
- [Homebrew](https://brew.sh/)
- [Composer](https://getcomposer.org/download/)
- [PHP ^7.2](https://vyspiansky.github.io/2018/11/08/set-up-php-7.2-on-macos-mojave-with-homebrew/)
- [Node/NPM](https://nodejs.org/en/download/current/)
- [MySQL](https://dev.mysql.com/doc/mysql-osx-excerpt/5.7/en/osx-installation-pkg.html) _(Or run `brew install mysql`)_


## Setup

1. Clone the repository to your local machine: `git clone https://github.com/WeAreModus/Laravel-Challenge.git`
1. Copy .env.example: `cp .env.example .env`
1. Generate your app key: `php artisan key:generate`
1. Install dependencies and compile CSS: `composer install && npm install && npm run dev`
1. Create the mySQL database
    1. Connect to your mySQL REPL: `mysql -uroot` _(if your mySQL installation has a root password set, you may need to provide it by adding the `-p` modifier to the end of this command, then enter your password when prompted)_
    1. Create the database: `CREATE DATABASE IF NOT EXISTS laravel;`
1. Run database migrations: `php artisan migrate:fresh --seed` _(Once again, if your mySQL root user has a password, enter it as `DB_PASSWORD` in .env)_
1. Launch the development server: `php artisan serve`

## Instructions

1. Create a seeder which generates a user with the email `admin@admin.com` and password `password`
1. Create a Product resource with these attributes:
    ```
   name
   description
   price
   address
   state
   city
   zip
   country
   photo
   ```
1. Create a seeder which creates 20 products
1. Create a page `/products` which shows all elements in the Product resource
    1. Add a redirect from `/` to `/products`
1. Implement the page `/products/{product}` to show a specific product
1. Implement a form at the endpoint `/products/create` to insert new products. Only authenticated user may create new products. _(Refer to [Resource Controllers](https://laravel.com/docs/7.x/controllers#resource-controllers))_
1. Implement a form at the endpoint `/products/{product}/edit` to update a product. Only authenticated user may edit products. _(Refer to [Resource Controllers](https://laravel.com/docs/7.x/controllers#resource-controllers))_
1. Write tests which validate the functionality of at least the `/products` and `/products/{product}` endpoints

## Challenge Goals

- Create any necessary models, migrations, seeders, and factories
- Create a basic CRUD API for Products
- Write tests which validate the functionality of at least the `/products` and `/products/{product}` endpoints

## Notes

- A very simple UI is fine, this task is mostly focused on the backend
- All Product attributes are required
- Avoid hard-coding values whenever possible
- Validate user inputs
- All data structures should be re-created when run on another machine
