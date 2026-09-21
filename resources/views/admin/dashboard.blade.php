
<x-app-layout>

    <style>
        .admin-page {
            background: #f5f7fb;
            min-height: 100vh;
            padding: 35px 20px 60px;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: auto;
        }

        /* Dashboard Header */
        .dashboard-header {
            margin-bottom: 25px;
            padding: 18px 22px;
            background: #fff5f5;
            border-left: 5px solid #ef4444;
            border-radius: 12px;
        }

        .dashboard-header h1 {
            font-size: 32px;
            font-weight: 800;
            color: #dc2626;
            margin: 0;
        }

        .dashboard-header p {
            margin-top: 6px;
            color: #6b7280;
            font-size: 15px;
        }

        .welcome-box {
            background: #f1f3f5;
            color: #374151;
            padding: 30px;
            border-radius: 18px;
            margin-bottom: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .welcome-box h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            color: #374151;
        }

        .welcome-box p {
            margin-top: 8px;
            font-size: 16px;
            color: #6b7280;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
            border: 1px solid #eeeeee;
            transition: 0.25s;
            text-decoration: none;
            display: block;
            color: inherit;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .red-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        .blue-icon {
            background: #dbeafe;
            color: #2563eb;
        }

        .yellow-icon {
            background: #fef3c7;
            color: #d97706;
        }

        .green-icon {
            background: #dcfce7;
            color: #16a34a;
        }

        .purple-icon {
            background: #ede9fe;
            color: #7c3aed;
        }

        .orange-icon {
            background: #ffedd5;
            color: #ea580c;
        }

        .stat-card h3 {
            margin: 0;
            font-size: 15px;
            color: #6b7280;
            font-weight: 600;
        }

        .stat-number {
            margin-top: 5px;
            font-size: 30px;
            font-weight: 800;
            color: #1f2937;
        }

        .stat-link-text {
            margin-top: 8px;
            font-size: 13px;
            color: #6b7280;
        }

        /* Management */
        .section-title {
            font-size: 23px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 18px;
        }

        .management-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .management-card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            text-decoration: none;
            color: #1f2937;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
            transition: 0.25s;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .management-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.11);
        }

        .management-icon {
            width: 58px;
            height: 58px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
        }

        .management-content h3 {
            margin: 0;
            font-size: 19px;
            font-weight: 800;
        }

        .management-content p {
            margin-top: 6px;
            color: #6b7280;
            font-size: 14px;
        }

        .arrow {
            margin-left: auto;
            font-size: 22px;
            color: #9ca3af;
        }

        /* Reports */
        .report-box {
            margin-top: 25px;
            background: #f1f3f5;
            color: #374151;
            padding: 25px;
            border-radius: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .report-box h3 {
            margin: 0;
            font-size: 21px;
            font-weight: 800;
            color: #374151;
        }

        .report-box p {
            margin-top: 5px;
            font-size: 14px;
            color: #6b7280;
        }

        .report-button {
            background: #ffffff;
            color: #374151;
            padding: 11px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            border: 1px solid #d1d5db;
        }

        .report-button:hover {
            background: #e5e7eb;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .management-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .report-box {
                display: block;
            }

            .report-button {
                display: inline-block;
                margin-top: 15px;
            }
        }
    </style>


    <div class="admin-page">

        <div class="dashboard-container">

            <div class="dashboard-header">

                <h1>Admin Dashboard</h1>

                <p>
                    Order Management System
                </p>

            </div>


            <!-- Welcome -->
            <div class="welcome-box">

                <h2>
                    Welcome, {{ auth()->user()->name }}! 
                </h2>

                <p>
                    Manage customers, orders and order items from one place.
                </p>

            </div>


            <!-- Statistics -->
            <div class="stats-grid">


                <!-- Total Customers -->
                <a href="{{ route('admin.customers.index') }}"
                class="stat-card">

                    <div class="stat-icon red-icon">
                        👥
                    </div>

                    <h3>
                        Total Customers
                    </h3>

                    <div class="stat-number">
                        {{ $totalCustomers }}
                    </div>

                    <div class="stat-link-text">
                        Click to view all customers →
                    </div>

                </a>


                <!-- Total Orders -->
                <a href="{{ route('admin.orders.index') }}"
                class="stat-card">

                    <div class="stat-icon blue-icon">
                        📦
                    </div>

                    <h3>
                        Total Orders
                    </h3>

                    <div class="stat-number">
                        {{ $totalOrders }}
                    </div>

                    <div class="stat-link-text">
                        Click to view all orders →
                    </div>

                </a>


                <!-- Pending Orders -->
                <a href="{{ route('admin.pending-orders') }}"
                class="stat-card">

                    <div class="stat-icon yellow-icon">
                        ⏳
                    </div>

                    <h3>
                        Pending Orders
                    </h3>

                    <div class="stat-number">
                        {{ $pendingOrders }}
                    </div>

                    <div class="stat-link-text">
                        Click to view pending orders →
                    </div>

                </a>


                <!-- Delivered Orders -->
                <a href="{{ route('admin.delivered-orders') }}"
                 class="stat-card">

                    <div class="stat-icon green-icon">
                        ✅
                    </div>

                    <h3>
                        Delivered Orders
                    </h3>

                    <div class="stat-number">
                        {{ $deliveredOrders }}
                    </div>

                    <div class="stat-link-text">
                        Click to view delivered orders →
                    </div>

                </a>


                <!-- Total Sales -->
                <a href="{{ route('admin.orders.index') }}"
                class="stat-card">

                    <div class="stat-icon purple-icon">
                        💰
                    </div>

                    <h3>
                        Total Sales
                    </h3>

                    <div class="stat-number">
                        ₹{{ number_format($totalSales, 2) }}
                    </div>

                    <div class="stat-link-text">
                        Click to view orders →
                    </div>

                </a>


                <!-- Order Items -->
                <a href="{{ route('admin.order-items.index') }}"
                class="stat-card">

                    <div class="stat-icon orange-icon">
                        🛒
                    </div>

                    <h3>
                        Order Items
                    </h3>

                    <div class="stat-number">
                        Manage
                    </div>

                    <div class="stat-link-text">
                        Click to manage order items 
                    </div>

                </a>

            </div>


            <!-- Management -->
            <div class="section-title">
                Management
            </div>


            <div class="management-grid">


                <!-- Manage Customers -->
                <a href="{{ route('admin.customers.index') }}"
                class="management-card">

                    <div class="management-icon red-icon">
                        👥
                    </div>

                    <div class="management-content">

                        <h3>
                            Manage Customers
                        </h3>

                        <p>
                            View, add, edit and manage customers.
                        </p>

                    </div>

                    <div class="arrow">
                        →
                    </div>

                </a>


                <!-- Manage Orders -->
                <a href="{{ route('admin.orders.index') }}"
                class="management-card">

                    <div class="management-icon blue-icon">
                        📦
                    </div>

                    <div class="management-content">

                        <h3>
                            Manage Orders
                        </h3>

                        <p>
                            View and manage customer orders.
                        </p>

                    </div>

                    <div class="arrow">
                        →
                    </div>

                </a>


                <a href="{{ route('admin.order-items.index') }}"
                class="management-card">

                    <div class="management-icon orange-icon">
                        🛒
                    </div>

                    <div class="management-content">

                        <h3>
                            Manage Order Items
                        </h3>

                        <p>
                            Manage products and items inside orders.
                        </p>

                    </div>

                    <div class="arrow">
                        →
                    </div>

                </a>


                <!-- View Reports -->
                <a href="{{ route('admin.reports') }}"
                class="management-card">

                    <div class="management-icon purple-icon">
                        📊
                    </div>

                    <div class="management-content">

                        <h3>
                            View Reports
                        </h3>

                        <p>
                            Check complete order and sales reports.
                        </p>

                    </div>

                    <div class="arrow">
                        →
                    </div>

                </a>

            </div>


            <!-- Reports -->
            <div class="report-box">

                <div>

                    <h3>
                        📊 Order Management Reports
                    </h3>

                    <p>
                        Check complete customer, order and sales information.
                    </p>

                </div>

                <a href="{{ route('admin.reports') }}"
                   class="report-button">

                    View Reports 

                </a>

            </div>

        </div>

    </div>

</x-app-layout>
