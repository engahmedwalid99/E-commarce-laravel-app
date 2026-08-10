# 🛒 E-Commerce Laravel Application

<div align="center">

### 🚀 A Modern E-Commerce Web Application Built with Laravel

A full-stack e-commerce application built with **Laravel, PHP, MySQL, Blade, Tailwind CSS, and JavaScript**.

</div>

---

## 📌 About The Project

**E-Commerce Laravel App** is a modern online shopping platform built with Laravel.

The project provides a complete foundation for an e-commerce system, including user authentication, product management, newsletter subscriptions, database management, and a seller dashboard.

The project is designed with a clean and responsive interface and follows Laravel's MVC architecture.

---

## ✨ Features

* 🔐 User Authentication
* 👤 User Profile
* 🛍️ Product Management
* ➕ Add Products
* 🧑‍💼 Seller Dashboard
* 📧 Newsletter Subscription
* 🚫 Prevent Duplicate Newsletter Emails
* 🗄️ MySQL Database
* ✅ Form Request Validation
* 🎨 Responsive UI
* ⚡ Laravel Blade Templates
* 📱 Mobile-Friendly Design
* 🔒 CSRF Protection
* 🧩 Laravel MVC Architecture

---

## 🛠️ Technologies Used

| Technology      | Usage                 |
| --------------- | --------------------- |
| 🐘 PHP          | Backend               |
| 🚀 Laravel      | PHP Framework         |
| 🗄️ MySQL       | Database              |
| 🎨 Blade        | Frontend Templates    |
| 💨 Tailwind CSS | UI Styling            |
| ⚡ JavaScript    | Frontend Interactions |
| 📦 Composer     | PHP Dependencies      |
| 📦 NPM          | Frontend Dependencies |
| 🔧 Vite         | Frontend Build Tool   |
| 🐙 Git & GitHub | Version Control       |

---

# 📂 Project Structure

```text
E-commerce-laravel-app/
│
├── app/
│   ├── Http/
│   ├── Models/
│   └── ...
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
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

# 💻 Requirements

Before running the project, make sure you have installed:

* PHP 8.2 or higher
* Composer
* MySQL
* Node.js & NPM
* Git

You can check your installed versions using:

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

Then enter the project directory:

```bash
cd E-commarce-laravel-app
```

---

## 2. Install PHP Dependencies

Run:

```bash
composer install
```

---

## 3. Install Frontend Dependencies

Run:

```bash
npm install
```

---

## 4. Create the Environment File

Copy the example environment file:

### Windows

```bash
copy .env.example .env
```

### Linux / macOS

```bash
cp .env.example .env
```

---

## 5. Generate Laravel Application Key

Run:

```bash
php artisan key:generate
```

---

# 🗄️ Database Setup

Create a new MySQL database.

For example:

```text
ecommerce
```

Then open your `.env` file and configure your database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=
```

> Change the database username and password according to your local MySQL configuration.

---

## 6. Run Database Migrations

Run:

```bash
php artisan migrate
```

If the project contains seeders and you want to insert sample data:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

---

# 🔗 Storage Link

If the application uses uploaded files or images, run:

```bash
php artisan storage:link
```

---

# 🎨 Run the Frontend

During development, run:

```bash
npm run dev
```

Keep this terminal running.

---

# 🚀 Run Laravel

Open another terminal and run:

```bash
php artisan serve
```

The application will usually be available at:

```text
http://127.0.0.1:8000
```

Open the URL in your browser.

---

# ⚡ Quick Start

If everything is already installed, you can use:

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

Then, in another terminal:

```bash
php artisan serve
```

---

# 🔐 Environment Variables

Never upload your real `.env` file to GitHub.

The project uses:

```text
.env
```

for local/private configuration.

The repository only contains:

```text
.env.example
```

as a template.

---

# 👨‍💻 Developer

**Ahmed Walid**

Full Stack Developer

### GitHub

https://github.com/engahmedwalid99

---

# 📌 Repository

You can find the source code here:

https://github.com/engahmedwalid99/E-commarce-laravel-app

---

# 🤝 Contributing

Contributions are welcome.

If you want to improve the project:

1. Fork the repository.
2. Create a new branch.

```bash
git checkout -b feature/new-feature
```

3. Make your changes.
4. Commit your changes.

```bash
git commit -m "Add new feature"
```

5. Push the branch.

```bash
git push origin feature/new-feature
```

6. Open a Pull Request.

---

# ⭐ Support

If you like this project, consider giving the repository a ⭐ on GitHub.

---

## 📄 License

This project is open-source and available for educational and development purposes.
