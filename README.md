# Project Information

## About Project
Taskr is task sourcing platform for people to outsource tasks to others who wants to make a quick living from it. Taskr is built on Laravel framework using PHP 7.1 and currently developed by a group of five developers.

## Setting Your Dev Environment
> ###### As this project is not meant to be production ready, it is advisable to perform the same steps below when deploying the application for production.

#### Follow the steps below to replicate the environment required for development. There are two ways to setup _Taskr_ where one involves in running the environment in a virtual machine while the other in your local machine. It is up to your discretion in the choice made.

### Using Homestead (Recommended)
1. Install and Configure Homestead by following this [guide](https://laravel.com/docs/5.4/homestead).
    1. When configuring the `sites` in `homestead.yaml`, use the code block below and replace the folder path with the actual path
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
    1. You can also execute database setup code using the SQL file provided `psql -U homestead -h localhost example.sql`.
10. If configured properly in the guide found in step 1, your application should be accessible from your local machine through the domain you have configured.

### Using XAMP (LAMP, MAMP, WAMP) Stack
1. Installing the pre-requisites using one-click installers provided by Bitnami below. Choose your stack based on your host operating system.
    1. https://bitnami.com/stack/lamp (Linux)
    2. https://bitnami.com/stack/wamp (Windows)
    3. https://bitnami.com/stack/mamp (MacOS)
2. Install `composer` onto your machine from https://getcomposer.org/.
3. Navigate to the project folder and run `composer install` to install PHP dependencies.
4. In the same folder, run `yarn` to install Javascript dependencies (e.g. jQuery, Bootstrap, etc.).
5. Create `.env` file and copy `.env.example` content into it. Configure `.env` information with respect to your host configuration.
6. Access your  `postgreSQL` database using `phpPgAdmin` and create a new database called `taskr`.
7. Run database migrations to setup the database tables automatically using `php artisan migrate`.
    1. You can also execute database setup code using the SQL file provided `psql -U {your_username} -h localhost example.sql`.
8. Ensure that your project folder is in your Apache folder (e.g. Linux - /var/www/html) and it has writable permissions.
9. Navigate to the site based on your Apache settings using your browser.

## Database Models and Manipulation
Due to the restrictions against ORMs (Eloquent), the project requires the execution of raw queries instead. To understand how to do that in Laravel, take a look at their [documentation](https://laravel.com/docs/5.4/database#running-queries) to learn more.

## Populate the database with fake data
Run the SQL queries in database/beta-taskr.sql
User with credentials u/test@gmail.com p/123456 has all data needed to explore all of taskr's functionality.

## Learning Laravel
Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Developer Announcement
Due to too many broken code pushed directly into the master branch, everyone should be developing within their branches and making pull request when trying to merge back into master.
