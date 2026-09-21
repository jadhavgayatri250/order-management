<x-app-layout>

    <style>
        .customer-page {
            background: #f5f7fb;
            min-height: 100vh;
            padding: 35px 20px 60px;
        }

        .customer-container {
            max-width: 1200px;
            margin: auto;
        }

        /* Dashboard Header */
        .customer-header {
            margin-bottom: 25px;
            padding: 18px 22px;
            background: #fff5f5;
            border-left: 5px solid #ef4444;
            border-radius: 12px;
        }

        .customer-header h1 {
            font-size: 32px;
            font-weight: 800;
            color: #dc2626;
            margin: 0;
        }

        .customer-header p {
            margin-top: 6px;
            color: #6b7280;
            font-size: 15px;
        }

        /* Welcome */
        .welcome-box {
            background: #f1f3f5;
            color: #374151;
            padding: 32px;
            border-radius: 18px;
            margin-bottom: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .welcome-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .welcome-box h2 {
            margin: 0;
            font-size: 29px;
            font-weight: 800;
            color: #374151;
        }

        .welcome-box .welcome-small {
            margin-bottom: 7px;
            font-size: 14px;
            color: #6b7280;
            font-weight: 600;
        }

        .welcome-box p {
            margin-top: 9px;
            font-size: 15px;
            color: #6b7280;
        }

        .welcome-icon {
            width: 78px;
            height: 78px;
            border-radius: 18px;
            background: #e5e7eb;
            border: 1px solid #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            flex-shrink: 0;
        }

        /* Main Cards */
        .customer-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .customer-card {
            background: white;
            padding: 26px;
            border-radius: 18px;
            text-decoration: none;
            color: #1f2937;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
            transition: 0.25s;
            display: block;
        }

        .customer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .customer-icon {
            width: 58px;
            height: 58px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            margin-bottom: 18px;
        }

        .red-icon {
            background: #fee2e2;
        }

        .blue-icon {
            background: #dbeafe;
        }

        .green-icon {
            background: #dcfce7;
        }

        .customer-card h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            color: #1f2937;
        }

        .customer-card p {
            margin-top: 8px;
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .card-link {
            margin-top: 17px;
            font-size: 14px;
            font-weight: 700;
        }

        .red-link {
            color: #dc2626;
        }

        .blue-link {
            color: #2563eb;
        }

        .green-link {
            color: #16a34a;
        }

        /* Quick Information */
        .quick-box {
            background: white;
            padding: 27px;
            border-radius: 18px;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .section-icon {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            background: #fee2e2;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .section-heading h3 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
            color: #1f2937;
        }

        .section-heading p {
            margin-top: 4px;
            font-size: 14px;
            color: #6b7280;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .info-card {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            transition: 0.2s;
        }

        .info-card:hover {
            border-color: #fecaca;
            transform: translateY(-2px);
        }

        .info-label {
            font-size: 13px;
            color: #6b7280;
            font-weight: 600;
        }

        .info-text {
            margin-top: 6px;
            font-size: 15px;
            font-weight: 700;
            color: #1f2937;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .customer-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .customer-page {
                padding: 25px 15px 45px;
            }

            .customer-grid {
                grid-template-columns: 1fr;
            }

            .welcome-content {
                display: block;
            }

            .welcome-icon {
                margin-top: 20px;
            }

            .customer-header h1 {
                font-size: 27px;
            }

            .welcome-box h2 {
                font-size: 24px;
            }
        }
    </style>


    <div class="customer-page">

        <div class="customer-container">


            <!-- Dashboard Header -->
            <div class="customer-header">

                <h1>
                    Customer Dashboard
                </h1>

                <p>
                    Order Management System
                </p>

            </div>


            <!-- Welcome Section -->
            <div class="welcome-box">

                <div class="welcome-content">

                    <div>

                        <div class="welcome-small">
                            Welcome back!
                        </div>

                        <h2>
                            Hello, {{ auth()->user()->name }} 
                        </h2>

                        <p>
                            Manage your orders, track deliveries and update your profile.
                        </p>

                    </div>

                    <div class="welcome-icon">
                        🛍️
                    </div>

                </div>

            </div>


            <div class="customer-grid">


                <!-- Place New Order -->
                <a href="{{ route('orders.create') }}"
                class="customer-card">

                    <div class="customer-icon red-icon">
                        🛒
                    </div>

                    <h3>
                        Place New Order
                    </h3>

                    <p>
                        Create a new order and add your required products.
                    </p>

                    <div class="card-link red-link">
                        Create Order 
                    </div>

                </a>


                <!-- My Orders -->
                <a href="{{ route('orders.index') }}"
                class="customer-card">

                    <div class="customer-icon blue-icon">
                        📦
                    </div>

                    <h3>
                        My Orders
                    </h3>

                    <p>
                        View your orders, order details and current order status.
                    </p>

                    <div class="card-link blue-link">
                        View Orders 
                    </div>

                </a>


                <!-- My Profile -->
                <a href="{{ route('profile.edit') }}"
                class="customer-card">

                    <div class="customer-icon green-icon">
                        👤
                    </div>

                    <h3>
                        My Profile
                    </h3>

                    <p>
                        Manage your personal information and account settings.
                    </p>

                    <div class="card-link green-link">
                        Manage Profile 
                    </div>

                </a>


            </div>


            <div class="quick-box">

                <div class="section-heading">

                    <div class="section-icon">
                        ℹ️
                    </div>

                    <div>

                        <h3>
                            Quick Information
                        </h3>

                        <p>
                            Manage your orders easily from your dashboard.
                        </p>

                    </div>

                </div>


                <div class="info-grid">


                    <div class="info-card">

                        <div class="info-label">
                            Order
                        </div>

                        <div class="info-text">
                            Create and manage orders
                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-label">
                            Tracking
                        </div>

                        <div class="info-text">
                            Check order status
                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-label">
                            Account
                        </div>

                        <div class="info-text">
                            Update profile details
                        </div>

                    </div>


                </div>

            </div>


        </div>

    </div>

</x-app-layout>