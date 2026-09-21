# Order Management System

## Customer Order Management & Transaction Portal

### Overview

Order Management System is a Laravel-based web application that allows customers to create and manage orders, while administrators can manage customers, orders, order items, discounts, order statuses, and sales reports efficiently.

## Technologies Used

- PHP
- Laravel
- MySQL
- HTML
- CSS
- JavaScript
- Blade Templates
- Tailwind CSS
- Laravel Breeze
- Vite

## Features

- User Registration & Login
- Role-Based Authentication
- Admin Dashboard
- Customer Dashboard
- Customer Management
- Create & Manage Orders
- Order Items Management
- Order Total Calculation
- Discount Management
- Order Status Management
- Order Tracking
- Pending & Delivered Orders
- Sales Reports
- Customer Profile Management
- CRUD Operations

## Installation

```bash
git clone https://github.com/jadhavgayatri250/order-management.git
```

```bash
cd order-management
```

```bash
composer install
```

```bash
npm install
```

```bash
copy .env.example .env
```

```bash
php artisan key:generate
```

Configure MySQL database in `.env`:

```env
DB_DATABASE=order_management
DB_USERNAME=root
DB_PASSWORD=
```

```bash
php artisan migrate
```

```bash
npm run build
```

```bash
php artisan serve
```

Open in browser:

```text
http://127.0.0.1:8000/
```

### Admin Dashboard

```text
http://127.0.0.1:8000/admin/dashboard
```

### Customer Dashboard

```text
http://127.0.0.1:8000/customer/dashboard
```