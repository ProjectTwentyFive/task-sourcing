# DO NOT PUSH ANYTHING TO MASTER. ALL WORK SHOULD BE DONE ON A SEPARATE BRANCH AND MERGED IN
# THERE HAS BEEN TOO MUCH BROKEN CODE PUSHED TO MASTER

# Project Information

## About Project

Taskr is task sourcing platform for people to outsource tasks to others who wants to make a quick living from it. Taskr is currently 

## Setting Your Dev Environment
1. Configure Homestead by following this [guide](https://laravel.com/docs/5.4/homestead).
2. Start Homestead by `vagrant up` and SSH into it using `vagrant ssh`.
3. Navigate into the project folder within the SSH session and run `composer install` to get dependencies.
4. Run `yarn` to get javascript dependencies (e.g. jquery, bootstrap, etc.).
5. Execute `cp .env.example .env` and modify the .env file using your favourite editor e.g. `nano`, `vim`
6. From [Laravel Homestead](https://laravel.com/docs/5.4/homestead) guide, put in the username and password of the PostgreSQL into .env.
7. Login to PostgreSQL database using shell commands or Datagrip and create database called `taskr`.
8. To generate an application key, run the command `php artisan key:generate`.
9. Run database migrations to setup the tables using `php artisan migrate:reset`.
10. If configured properly in step 1, your application should be accessible from your machine through the domain you configured.

## Database Models and Manipulation
Due to the restrictions against ORMs (Eloquent), the project requires the execution of raw queries instead. To understand how to do that in Laravel, take a look at their [documentation](https://laravel.com/docs/5.4/database#running-queries) to learn more. 

## Learning Laravel
---
Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.
