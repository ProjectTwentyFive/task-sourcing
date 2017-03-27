# DO NOT PUSH ANYTHING TO MASTER. ALL WORK SHOULD BE DONE ON A SEPARATE BRANCH AND MERGED IN
# THERE HAS BEEN TOO MUCH BROKEN CODE PUSHED TO MASTER

# Project Information

## About Project
Taskr is task sourcing platform for people to outsource tasks to others who wants to make a quick living from it. Taskr is built on Laravel framework using PHP 7.1 and currently developed by a group of five developers.

## Setting Your Dev Environment
> ###### As this project is not meant to be production ready, it is advisable to perform the same steps below when deploying the application for production.

#### Follow the steps below to replicate the environment required for development. There are two ways to setup _Taskr_ where one involves in running the environment in a virtual machine while the other in your local machine. It is up to your discretion in the choice made.

### Using Homestead (Recommended)
1. Install and Configure Homestead by following this [guide](https://laravel.com/docs/5.4/homestead).
1.1. When configuring the `sites` in `homestead.yaml`, use the code block below and replace the folder path with the actual path
    ```
    sites:
         - map: homestead.app
          to: {folder_path}/public
    ```
2. Start Homestead by `vagrant up` and SSH into Homestead using `vagrant ssh`.
3. Navigate into the project folder within the SSH session and run `composer install` to get PHP dependencies.
4. Run `yarn` to install Javascript dependencies (e.g. jQuery, Bootstrap, etc.).
5. Run `cp .env.example .env` and modify the .env file using your favourite editor e.g. `nano`, `vim`, `sublime`
6. From [Laravel Homestead](https://laravel.com/docs/5.4/homestead) guide, put in the username and password of the PostgreSQL into .env. defaults: `username: homestead, password: secret`
7. Login to PostgreSQL database by running `psql -U homestead -h localhost` and create database using `CREATE DATABASE taskr` within `psql` shell.
8. Generate an application key for laravel by running the command `php artisan key:generate`.
9. Run database migrations to setup the database tables automatically using `php artisan migrate`.
9.1. You can also execute database setup code using the SQL file provided `psql -U homestead -h localhost example.sql`.
10. If configured properly in the guide found in step 1, your application should be accessible from your local machine through the domain you have configured.

### Using LAMP Stack
1. Installing pre-requisites

## Database Models and Manipulation
Due to the restrictions against ORMs (Eloquent), the project requires the execution of raw queries instead. To understand how to do that in Laravel, take a look at their [documentation](https://laravel.com/docs/5.4/database#running-queries) to learn more. 

## Learning Laravel
Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.
