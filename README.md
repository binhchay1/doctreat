# 🩺 Doctreat

> **Doctreat** is a comprehensive web platform designed for **pet clinics** to manage appointments, services, and online pet product sales.  
> It combines e-commerce functionality with a professional medical booking system and calendar visualization — offering a complete digital solution for modern veterinary practices.

---

## 🐾 Overview

Doctreat allows pet owners to:
- Book vet appointments and select available services  
- Manage pet profiles and view upcoming appointments  
- Purchase pet-related products directly from the integrated shop  

Meanwhile, clinic administrators can:
- Manage doctors, staff, and patient bookings  
- Oversee clinic services and pricing  
- Track inventory and warehouse data  
- Display a visual appointment calendar similar to **Google Calendar** for easy scheduling  

---

## 🚀 Key Features

### 🧍 For Users
- Register and log in securely  
- Create and manage pet profiles  
- Book vet appointments and select services  
- Browse and purchase pet products  
- View appointment schedules in a visual calendar interface  

### 🩺 For Clinic Admins
- Manage doctors, services, and appointment slots  
- Handle inventory and warehouse data (stock-in / stock-out)  
- Manage orders and payment records  
- Visualize the clinic’s schedule via calendar integration (Google Calendar-like)  

---

## ⚙️ Tech Stack

| Component             | Technology Used                     |
|-----------------------|------------------------------------|
| Backend               | Laravel (PHP Framework)            |
| Frontend              | Blade Templates, HTML5, CSS3, Tailwind CSS |
| Database              | MySQL                              |
| Authentication        | Laravel Auth & Middleware           |
| Appointment Calendar  | FullCalendar.js Integration         |
| E-Commerce Module     | Laravel Eloquent ORM + Payment Gateway |
| Inventory Management  | Laravel MVC CRUD Structure          |

---

## 🧰 Installation Guide

1. **Clone the repository**
   ```bash
   git clone https://github.com/binhchay1/doctreat.git
   cd doctreat
   composer install
   npm install
   npm run dev
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve


📁 Project Structure
doctreat/
├── app/                 # Core application logic (Models, Controllers, etc.)
├── routes/              # Route definitions
├── resources/views/     # Blade templates for frontend views
├── public/              # Public assets (CSS, JS, Images)
├── database/            # Migrations and seeders
├── tests/               # Unit and feature tests
├── webpack.mix.js       # Asset compilation settings
└── ...


🧩 Future Enhancements

RESTful API for mobile app integration

Online payment integration (VNPay, ZaloPay, Stripe, etc.)

Service review and rating system

Email/SMS reminders for upcoming appointments

Multi-branch clinic support

🤝 Contribution

Pull requests are welcome!
If you encounter any bugs or have feature suggestions, please open an issue or submit a PR.

📬 Contact

Author: binhchay1

Email: binhchay1@gmail.com

GitHub: github.com/binhchay1
