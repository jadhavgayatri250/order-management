<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Management</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .page {
            min-height: 100vh;
            padding: 35px 20px 60px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        /* Header */

        .page-header {
            background: #fff5f5;
            border-left: 5px solid #ef4444;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
            color: #dc2626;
        }

        .page-header p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* Success Message */

        .success-message {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #15803d;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Top Bar */

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 800;
            color: #1f2937;
        }

        .add-button {
            background: #dc2626;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.2s;
        }

        .add-button:hover {
            background: #b91c1c;
        }

        /* Table Card */

        .table-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        thead {
            background: #f9fafb;
        }

        th {
            text-align: left;
            padding: 16px 18px;
            font-size: 13px;
            color: #6b7280;
            font-weight: 800;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 17px 18px;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #fffafa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Customer ID */

        .customer-id {
            font-weight: 800;
            color: #dc2626;
        }

        /* Customer Name */

        .customer-name {
            font-weight: 700;
            color: #1f2937;
        }

        /* Email */

        .customer-email {
            color: #4b5563;
        }

        /* Phone */

        .customer-phone {
            color: #4b5563;
        }

        /* Address */

        .customer-address {
            color: #6b7280;
            max-width: 220px;
        }

        /* Actions */

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .action-button {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .view-button {
            background: #dbeafe;
            color: #2563eb;
        }

        .view-button:hover {
            background: #bfdbfe;
        }

        .edit-button {
            background: #fef3c7;
            color: #b45309;
        }

        .edit-button:hover {
            background: #fde68a;
        }

        .delete-button {
            background: #fee2e2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fecaca;
        }

        /* Empty */

        .empty-row {
            text-align: center;
            padding: 45px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .empty-text {
            font-size: 15px;
            font-weight: 600;
        }

        /* Footer */

        .footer-actions {
            margin-top: 25px;
        }

        .back-button {
            display: inline-block;
            background: #ffffff;
            color: #374151;
            padding: 11px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            border: 1px solid #d1d5db;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #e5e7eb;
        }

        /* Responsive */

        @media (max-width: 700px) {

            .page {
                padding: 25px 15px 45px;
            }

            .top-bar {
                align-items: flex-start;
                flex-direction: column;
            }

            .add-button {
                width: 100%;
                text-align: center;
            }

            .page-header h1 {
                font-size: 26px;
            }

        }

    </style>

</head>


<body>

    <div class="page">

        <div class="container">


            <!-- Page Header -->

            <div class="page-header">

                <h1>
                    Customer Management
                </h1>

                <p>
                    View, add, edit and manage customer information.
                </p>

            </div>


            <!-- Success Message -->

            @if(session('success'))

                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>

            @endif


            <!-- Top Bar -->

            <div class="top-bar">

                <div class="section-title">
                    All Customers
                </div>

                <a href="{{ route('admin.customers.create') }}"
                   class="add-button">

                    + Add New Customer

                </a>

            </div>


            <!-- Customer Table -->

            <div class="table-card">

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Phone
                                </th>

                                <th>
                                    Address
                                </th>

                                <th>
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($customers as $customer)

                                <tr>

                                    <td>
                                        <span class="customer-id">
                                            #{{ $customer->id }}
                                        </span>
                                    </td>


                                    <td>
                                        <span class="customer-name">
                                            {{ $customer->name }}
                                        </span>
                                    </td>


                                    <td>
                                        <span class="customer-email">
                                            {{ $customer->email }}
                                        </span>
                                    </td>


                                    <td>
                                        <span class="customer-phone">
                                            {{ $customer->phone ?: '—' }}
                                        </span>
                                    </td>


                                    <td>
                                        <span class="customer-address">
                                            {{ $customer->address ?: '—' }}
                                        </span>
                                    </td>


                                    <td>

                                        <div class="actions">


                                            <!-- View -->

                                            <a href="{{ route('admin.customers.show', $customer->id) }}"
                                               class="action-button view-button">

                                                View

                                            </a>


                                            <!-- Edit -->

                                            <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                            class="action-button edit-button">

                                                Edit

                                            </a>


                                            <!-- Delete -->

                                            <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                method="POST"
                                                style="display:inline;">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                        class="action-button delete-button"
                                                        onclick="return confirm('Are you sure you want to delete this customer?')">

                                                    Delete

                                                </button>

                                            </form>


                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="6">

                                        <div class="empty-row">

                                            <div class="empty-icon">
                                                👥
                                            </div>

                                            <div class="empty-text">
                                                No customers found.
                                            </div>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- Back -->

            <div class="footer-actions">

                <a href="{{ route('admin.dashboard') }}"
                   class="back-button">

                    ← Back to Dashboard

                </a>

            </div>


        </div>

    </div>

</body>

</html>