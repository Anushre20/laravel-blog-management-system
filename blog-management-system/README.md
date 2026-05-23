# Laravel Blog Management System

A modern Blog Management System built using Laravel, AJAX, jQuery, Bootstrap, and PostgreSQL/MySQL.  
The project allows admins to manage blogs dynamically while users can browse and filter blogs in real-time.

---

## Features

- Add, Edit, Delete Blogs
- Image Upload Support
- AJAX Live Search & Filtering
- Category-based Filtering
- Responsive UI
- Public Blog View
- Admin Dashboard

---

## Tech Stack

- Laravel
- PHP
- Bootstrap 5
- jQuery & AJAX
- PostgreSQL / MySQL
- Docker
- Render

---

## Setup Steps

```bash
git clone https://github.com/Anushre20/laravel-blog-management-system.git

cd laravel-blog-management-system/blog-management-system

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```
Update database credentials inside .env before running migrations.

--- 

## Important Note
For demo purposes, the admin dashboard currently does not include login authentication.
The admin panel is directly accessible for easy testing of CRUD operations.

Authentication can be added later as an enhancement.

---

### Author
Developed by Anupama
