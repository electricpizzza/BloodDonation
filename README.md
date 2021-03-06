# BloodDonation

# Getting started

## Installation


Switch to the repo folder

    cd to the project

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    
    cd to the project 
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
    set up the Databse in formation in '.env'
    
**Make sure you set the correct database connection information before running the migrations** 

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed


----------

# Code overview


## Environment variables

- `.env` - Environment variables can be set in this file

