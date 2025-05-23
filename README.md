# Laravel 12 REST API

A RESTful API built with **Laravel 12** providing basic authentication and CRUD functionality for posts. This project uses **Sanctum** for authentication and **MySQL** as the database via **XAMPP**.

---

## 🚀 Features

- User Sign Up & Login using **Laravel Sanctum**
- Create, Read, Update, and Delete posts
- Route protection for authenticated actions
- Clean and simple API structure

---

## ⚙️ Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/hm6280804/Rest_API.git
   cd Rest_API

2. Install Dependencies
composer install
3. Set Up Environment File
Copy .env.example to .env
cp .env.example .env

Update your .env with database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=

4.Generate Application Key
php artisan key:generate

5. Install Sanctum & API Setup
php artisan install:api

6.Run Migrations
php artisan migrate

7.Serve the App
php artisan serve

Authentication
This API uses Laravel Sanctum for authentication.

Register: POST /api/signup

Login: POST /api/login

After logging in, use the Bearer token provided to access protected routes.


Method	                                 Endpoint	                                  Description
GET	                                     /api/MyPosts                                 View all posts
POST	                                /api/MyPosts/1	                              Create new post
PUT	                                   /api/posts/{id}	                              Update a post
DELETE	                               /api/posts/{id}	                              Delete a post

Tech Stack
Laravel 12
Sanctum (package)
MySQL
PHP 8+
XAMPP (Local development)

👤 Author
Hanif
GitHub: hm6280804@gmail.com





