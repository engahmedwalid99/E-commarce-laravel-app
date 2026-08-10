# 🛒 E-Commerce Laravel Application

<div align="center">

### 🚀 Modern Full-Stack E-Commerce Platform Built with Laravel

A complete e-commerce web application built with **Laravel 12, PHP, MySQL, Blade, Tailwind CSS, JavaScript, and Vite**.

</div>

---

## 📌 About The Project

**E-Commerce Laravel Application** is a full-stack e-commerce platform built with **Laravel 12**.

The project is designed to provide a complete shopping platform with multiple user roles and dedicated dashboards for **Administrators, Sellers, and Users**.

It includes a complete authentication system, social authentication, passwordless login, user profile management, product management, seller dashboard, admin dashboard, newsletter subscriptions, email notifications, validation, and role-based functionality.

The application follows the **Laravel MVC architecture** and uses Laravel Form Requests for validation and Eloquent Models for database interaction.

---

# ✨ Features

## 🔐 Authentication

The application includes a complete authentication system:

* 🔑 Traditional Login
* 📝 User Registration
* 🔒 Password Update
* 🔄 Forgot Password
* 🚪 Logout
* 🔗 Passwordless Login using a secure login link
* 📧 Email notifications for authentication events
* 🛡️ Form Request Validation
* 🤖 Google reCAPTCHA v3

---

## 🌐 Social Authentication

Users can authenticate using external social providers through **Laravel Socialite**:

* 🔵 Google Login
* 🔷 Facebook Login
* ⚫ GitHub Login

---

## 👤 User Features

Registered users have access to their personal account:

* 👤 User Profile
* ✏️ Edit Profile Information
* 🔐 Change Password
* 📧 Manage Account Email
* 🚪 Logout
* 🛍️ Browse Products
* 🔎 View Product Details

---

## 🧑‍💼 Seller Dashboard

Sellers have their own dedicated dashboard.

Features include:

* 📊 Seller Dashboard
* ➕ Add New Products
* 🛍️ Product Management
* 📝 Product Validation
* 📦 Store Product Information
* 🖥️ Dedicated Seller Interface

---

## 👨‍💻 Admin Dashboard

Administrators have access to a dedicated administration panel.

Admin features include:

* 📊 Admin Dashboard
* 👥 View Users
* 🧑‍💼 View Sellers
* ➕ Add New Admin
* 🗑️ Delete Users
* 🔄 Update User Roles
* 📧 Invite Users to Become Admins

---

## 🛍️ Products

The application includes a product system with:

* 📋 Products Listing
* 🔎 Product Details
* ➕ Add Products
* 🗄️ Database Product Storage
* 🖼️ Product Image/File Support
* ✅ Product Validation

---

## 📧 Newsletter

The application includes a newsletter subscription system.

Features:

* 📩 Subscribe using email
* ✅ Email validation
* 🚫 Prevent duplicate email subscriptions
* 🗄️ Store newsletter subscribers in MySQL
* ⚠️ Display validation messages when an email already exists

Each email address can be registered for the newsletter only once.

---

## 📬 Email System

The application includes email functionality for important user actions.

Email templates include:

* ✉️ Registration Email
* 🔐 Login Notification Email
* 👨‍💼 Admin Invitation Email

---

# 🛡️ Security & Validation

The project uses several Laravel security and validation features:

* 🔒 CSRF Protection
* ✅ Laravel Form Requests
* 🔐 Password Authentication
* 🔗 Secure Passwordless Login
* 🤖 Google reCAPTCHA v3
* 🛡️ Role-based Access
* 🚫 Duplicate Email Prevention
* 🔑 Environment Variables for Sensitive Configuration

---

# 🛠️ Technologies Used

| Technology           | Usage                          |
| -------------------- | ------------------------------ |
| 🐘 PHP 8.2+          | Backend Programming            |
| 🚀 Laravel 12        | Application Framework          |
| 🗄️ MySQL            | Database                       |
| 🎨 Blade             | Server-Side Templates          |
| 💨 Tailwind CSS      | UI & Styling                   |
| ⚡ JavaScript         | Frontend Interactions          |
| 🔧 Vite              | Frontend Build Tool            |
| 📦 Composer          | PHP Dependency Management      |
| 📦 NPM               | Frontend Dependency Management |
| 🔐 Laravel Socialite | Social Authentication          |
| 🤖 reCAPTCHA v3      | Bot Protection                 |
| 🐙 Git & GitHub      | Version Control                |

---

# 📦 Main Laravel Packages

The project currently uses packages including:

* `laravel/framework`
* `laravel/socialite`
* `josiasmontag/laravel-recaptchav3`
* `laravel/tinker`
* `laravel/pail`
* `laravel/pint`
* `fakerphp/faker`
* `phpunit/phpunit`

---

# 📂 Project Structure

```text
E-commerce-laravel-app/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   ├── Auth/
│   │   │   ├── News/
│   │   │   ├── home/
│   │   │   └── products/
│   │   │
│   │   └── Requests/
│   │       ├── Admin/
│   │       ├── Auth/
│   │       ├── News/
│   │       └── products/
│   │
│   └── Models/
│       ├── User.php
│       ├── products.php
│       └── newsletter.php
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   └── views/
│       ├── Auth/
│       ├── Extends/
│       ├── Mails/
│       ├── Roles/
│       ├── products/
│       ├── home.blade.php
│       ├── Products.blade.php
│       └── Profile.blade.php
│
├── routes/
│   └── web.php
│
├── storage/
│
├── tests/
│
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── vite.config.js
└── README.md
```

---

# 👥 User Roles

The application is built around three main roles:

```text
                    E-Commerce Application
                            │
             ┌──────────────┼──────────────┐
             │              │              │
           Admin          Seller          User
             │              │              │
       Admin Dashboard  Seller Dashboard  Profile
       Manage Users     Add Products      Products
       Manage Sellers   Products          Product Details
       Add Admins
       Update Roles
       Delete Users
```

### 👨‍💻 Admin

Administrators can manage users, sellers, roles, and other administrative functionality.

### 🧑‍💼 Seller

Sellers have access to their dashboard and can add products to the platform.

### 👤 User

Regular users can register, login, manage their profile, browse products, and access the available shopping functionality.

---

# 🌐 Main Routes

The application currently includes routes for:

### 🏠 Main Application

```text
/
products
product-details/{id}
profile
user-dashboard
```

### 🔐 Authentication

```text
/login
/register
/forget-password
/Login-without-password
/Login-without-password/{user}
```

### 🌐 Social Login

```text
/auth/{driver}/redirect
/auth/{driver}/callback
```

Supported providers include:

```text
Google
Facebook
GitHub
```

### 👨‍💻 Admin

```text
/admin-dashboard
/admin-dashboard/users
/admin-dashboard/sellers
/admin-dashboard/add-admin
/admin-dashboard/delete-user/{id}
/admin-dashboard/update-user-role/{id}
```

### 🧑‍💼 Seller

```text
/seller-dashboard
/seller-dashboard/add-product
```

### 📧 Newsletter

```text
/subscribe
```

---

# 💻 Requirements

Before installing the project, make sure you have:

* PHP 8.2 or higher
* Composer
* MySQL
* Node.js
* NPM
* Git

Check your installed versions:

```bash
php -v
```

```bash
composer -V
```

```bash
node -v
```

```bash
npm -v
```

```bash
git --version
```

---

# 📥 Installation

## 1. Clone the Repository

Open your terminal and run:

```bash
git clone https://github.com/engahmedwalid99/E-commarce-laravel-app.git
```

Enter the project directory:

```bash
cd E-commarce-laravel-app
```

---

## 2. Install PHP Dependencies

```bash
composer install
```

---

## 3. Install Frontend Dependencies

```bash
npm install
```

---

## 4. Create `.env`

### Windows

```bash
copy .env.example .env
```

### Linux / macOS

```bash
cp .env.example .env
```

---

## 5. Generate Application Key

```bash
php artisan key:generate
```

---

# 🗄️ Database Configuration

Create a MySQL database.

For example:

```text
ecommerce
```

Then configure your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=
```

> Update the database username and password according to your MySQL configuration.

---

# 🔑 Authentication Configuration

If you want to use social authentication, configure the required credentials in `.env`.

Example:

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=

FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT_URI=

GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_REDIRECT_URI=
```

---

# 🤖 reCAPTCHA Configuration

The project uses **Google reCAPTCHA v3**.

Add your reCAPTCHA credentials to `.env` according to your configured keys:

```env
RECAPTCHAV3_SITEKEY=
RECAPTCHAV3_SECRET=
```

---

# 📧 Mail Configuration

Some application features send emails, including registration, login notifications, passwordless login, and admin invitations.

Configure your mail settings in `.env`:

```env
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
```

---

# 🗃️ Run Database Migrations

Run:

```bash
php artisan migrate
```

If you want to reset the database and run all migrations again:

```bash
php artisan migrate:fresh
```

If seed data is available:

```bash
php artisan migrate --seed
```

---

# 🔗 Storage Link

If the application uses uploaded files or images:

```bash
php artisan storage:link
```

---

# 🎨 Run Frontend

For development:

```bash
npm run dev
```

Keep this terminal running.

---

# 🚀 Start Laravel

Open another terminal and run:

```bash
php artisan serve
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

Open the URL in your browser.

---

# ⚡ Quick Start

After cloning the project, you can run:

```bash
git clone https://github.com/engahmedwalid99/E-commarce-laravel-app.git

cd E-commarce-laravel-app

composer install

npm install

copy .env.example .env

php artisan key:generate

php artisan migrate

php artisan storage:link

npm run dev
```

Then open another terminal:

```bash
php artisan serve
```

---

# 🔐 Environment & Security

**Never upload your real `.env` file to GitHub.**

The `.env` file may contain sensitive information such as:

* Database credentials
* Application keys
* Mail credentials
* Google credentials
* Facebook credentials
* GitHub credentials
* reCAPTCHA secret keys

The repository contains:

```text
.env.example
```

which should be used as a template.

---

# 📸 Application Pages

The project includes multiple interfaces and pages:

### Public Pages

* 🏠 Home
* 🛍️ Products
* 🔎 Product Details
* 📧 Newsletter Subscription

### Authentication Pages

* 🔐 Login
* 📝 Register
* 🔑 Forgot Password
* 🔗 Passwordless Login
* 🔐 Update Password

### User Pages

* 👤 Profile
* ✏️ Edit Profile
* 🔐 Update Password
* 👤 User Dashboard

### Seller Pages

* 🧑‍💼 Seller Dashboard
* ➕ Add Product

### Admin Pages

* 👨‍💻 Admin Dashboard
* 👥 Users
* 🧑‍💼 Sellers
* ➕ Add Admin

---

# 👨‍💻 Developer

### Ahmed Walid

**Full Stack Developer**

GitHub:

https://github.com/engahmedwalid99

---

# 📌 Repository

Source Code:

https://github.com/engahmedwalid99/E-commarce-laravel-app

---

# 🤝 Contributing

Contributions, improvements, and suggestions are welcome.

### 1. Fork the repository

### 2. Create a new branch

```bash
git checkout -b feature/new-feature
```

### 3. Make your changes

### 4. Commit your changes

```bash
git add .
git commit -m "Add new feature"
```

### 5. Push your branch

```bash
git push origin feature/new-feature
```

### 6. Open a Pull Request

---

# ⭐ Support

If you find this project useful or interesting, consider giving the repository a ⭐ on GitHub.

---

## 📄 License

This project is open-source and available for educational and development purposes.
