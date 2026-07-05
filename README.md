# URL Shortener

This is a URL Shortener project built using Laravel.

## Features

### SuperAdmin

* Create and manage Companies
* Create Admins and assign them to a Company

### Admin

* Create and manage Members
* Create and manage Short URLs

### Member

* Create and manage their own Short URLs

## Tech Stack

* PHP 8.x
* Laravel 12
* MySQL
* Bootstrap 5

## Installation

### Clone the repository

```bash
git clone https://github.com/abhishekgoyal1212/url-shortener.git
```

### Install dependencies

```bash
composer install
```

### dont't Copy the environment file

i have push `.env` file.

### Generate the application key

```bash
php artisan key:generate
```

### Run migrations and seed the database

```bash
php artisan migrate --seed
```

### Start the development server

```bash
php artisan serve
```

## Authentication

* Laravel Authentication
* Role-based Authentication
* Middleware

## Database

* Database Migrations
* Database Seeder

## Roles

* SuperAdmin
* Admin
* Member

## Default SuperAdmin

The default SuperAdmin account is created by the database seeder. You can update the credentials in the seeder file if required.

## Author

Abhishek Goyal
