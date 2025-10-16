# Doctreat – Pet Clinic Management System 🩺🐾

![PHP](https://img.shields.io/badge/PHP-8.0-blue?logo=php) ![Laravel](https://img.shields.io/badge/Laravel-9.x-red?logo=laravel) ![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-blue?logo=tailwind-css) ![MySQL](https://img.shields.io/badge/MySQL-8.x-green?logo=mysql) ![License](https://img.shields.io/badge/License-MIT-green)

Welcome to **Doctreat**! 🚀 This is a comprehensive web platform for pet clinics, combining a professional medical booking system, a Google Calendar-like appointment scheduler, and an e-commerce module for pet products. Think of it as a full-stack CMS for veterinary practices, built to streamline operations for both pet owners and clinic admins.

## 📋 Project Overview
As a web dev, imagine building a hybrid app that’s part Booking.com for vet appointments and part Shopify for pet products. Doctreat answers questions like:
- 🐶 When’s the next available vet appointment for my pet?
- 🛒 Which pet products are in stock?
- 📅 How’s the clinic’s schedule looking this week?
- ⚠️ Are there any inventory shortages or booking conflicts?

Powered by **Laravel** and **Tailwind CSS**, with **FullCalendar.js** for slick scheduling and **MySQL** for robust data management, Doctreat is your go-to solution for modern pet clinics.

## 🗃️ Database
The system uses **MySQL** with key tables like:
- **Pets**: Stores pet profiles (like `users` in a CMS). Columns: `id`, `owner_id`, `name`, `species`, `age`.
- **Appointments**: Manages vet bookings (like `orders`). Columns: `id`, `pet_id`, `doctor_id`, `service_id`, `date`, `status`.
- **Services**: Clinic services (like `products`). Columns: `id`, `name`, `price`, `duration`.
- **Products**: Pet products for sale (like `items`). Columns: `id`, `name`, `price`, `stock`.
- **Orders**: E-commerce orders. Columns: `id`, `user_id`, `product_id`, `quantity`, `total`.

📂 Migrations and seeders are in `database/migrations/` and `database/seeders/`.

## 🛠️ Environment Requirements
To run Doctreat, you need:
- **PHP**: 8.0 or higher (Laravel 9.x requires it) 🐘
- **Node.js**: 16.x or higher (for Tailwind CSS and frontend assets) 🌐
- **MySQL**: 8.x or higher (or any Laravel-supported DB) 🗄️
- **Composer**: For PHP dependencies (like npm) 📦
- **System**: Linux, macOS, or Windows (WSL works great) 💻
- **Dependencies** (in `composer.json` and `package.json`):
  - `laravel/framework`: Backend core, like Express.js for PHP.
  - `tailwindcss`: Styling framework, like Bootstrap but lighter.
  - `fullcalendar`: Interactive calendar, like a JS plugin for scheduling.
  - `laravel/auth`: Authentication, like Passport.js.
  - Payment gateways (e.g., VNPay, Stripe) for e-commerce.

## ⚙️ Setup Instructions
Follow these steps to get Doctreat running, like spinning up a Laravel app with a modern frontend:

1. **Clone the Repository** 📥:
   ```bash
   git clone https://github.com/binhchay1/doctreat.git
   cd doctreat
   ```

2. **Install Backend Dependencies** 📦:
   Ensure [Composer](https://getcomposer.org/) is installed, then run:
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies** 🌐:
   Ensure [Node.js](https://nodejs.org/) is installed, then run:
   ```bash
   npm install
   npm run dev
   ```

4. **Configure the Environment** 🛠️:
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update `.env` with database and payment gateway credentials:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=doctreat
     DB_USERNAME=your_username
     DB_PASSWORD=your_password

     VNPAY_TMN_CODE=your_vnpay_code
     VNPAY_HASH_SECRET=your_vnpay_secret
     ```

5. **Generate Application Key** 🔑:
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations and Seeders** 🗄️:
   Set up the database schema and seed initial data:
   ```bash
   php artisan migrate --seed
   ```

7. **Start the Application** 🚀:
   Run the Laravel dev server:
   ```bash
   php artisan serve
   ```
   Access the app at `http://localhost:8000`.

## 🚀 How to Run
1. **Start the Server** 🌐:
   Use `php artisan serve` or configure Apache/Nginx to serve the `public/` directory.

2. **Test the Application** ▶️:
   - Visit `http://localhost:8000` for the user-facing interface (pet owners).
   - Access the admin dashboard at `http://localhost:8000/admin` (login required).
   - Use seeded credentials (e.g., `admin@doctreat.com` / `password`) to test.

3. **Stop the Server** 🛑:
   Ctrl+C to stop `php artisan serve` or stop your web server.

## 📁 Project Structure
Like a typical Laravel app with a modern frontend, here’s the layout:
```
doctreat/
├── app/                  # Core logic, like src/ in a Node.js app 🛠️
│   ├── Models/          # Eloquent models, like Mongoose schemas 📊
│   └── Http/Controllers/
├── database/             # Migrations and seeders, like Django migrations 🗄️
│   ├── migrations/
│   └── seeders/
├── resources/            # Frontend assets, like src/ in a React app 🎨
│   ├── views/           # Blade templates
│   ├── css/             # Tailwind CSS
│   └── js/              # FullCalendar.js and scripts
├── public/               # Public directory, like dist/ after a build 🌐
│   └── index.php
├── routes/               # API and web routes, like Express routes 🚏
├── tests/                # Unit and feature tests 🧪
├── .env.example          # Environment config template 📋
├── .gitignore            # Excludes storage/, vendor/, etc. 🚫
├── composer.json         # Backend dependencies 📋
├── package.json          # Frontend dependencies 📋
├── webpack.mix.js        # Asset compilation, like Vite config ⚙️
├── README.md             # You're reading it! 📖
└── LICENSE               # MIT License 📜
```

## 📈 Key Features
- **Pet Profiles**: Create and manage pet details (like user profiles) 🐶
- **Appointment Booking**: Book vet services with a calendar UI (like Google Calendar) 📅
- **E-Commerce**: Browse and buy pet products (like an online store) 🛒
- **Admin Dashboard**: Manage doctors, services, inventory, and orders (like a CMS) 📊
- **Calendar Integration**: Visualize schedules with FullCalendar.js 🎨

## 💡 Future Enhancements
Like scaling a web app, here are some ideas:
- **REST API**: Build a mobile-friendly API for iOS/Android apps 🌐
- **Payments**: Integrate VNPay, ZaloPay, or Stripe for seamless checkout 💸
- **Reviews**: Add a rating system for services (like Yelp for vets) ⭐
- **Notifications**: Send email/SMS reminders for appointments (use Laravel Mail) 📧
- **Multi-Branch**: Support multiple clinic locations (like a franchise system) 🏢

## 🛠️ Troubleshooting
- **Error: `Class not found`** ⚠️: Run `composer install` or `composer dump-autoload`.
- **Database Connection Failed** 🚫: Check `.env` credentials and ensure MySQL is running.
- **Frontend Assets Not Loading** 🌐: Run `npm run dev` or `npm run build`.
- **Calendar Not Displaying** 📅: Ensure FullCalendar.js is loaded (`npm install @fullcalendar/core`).
- **Payment Gateway Errors** 💸: Verify API keys in `.env` for VNPay/Stripe.

## 🤝 Contributing
Feel free to fork, submit PRs, or open issues! Treat it like contributing to an open-source Laravel package. 🌟

## 📜 License
MIT License (see `LICENSE`).

## 📞 Contact
- **Author**: binhchay1
- **Email**: binhchay1@gmail.com
- **GitHub**: [github.com/binhchay1](https://github.com/binhchay1)
Got questions? Open an issue at [github.com/binhchay1/doctreat/issues](https://github.com/binhchay1/doctreat/issues).
