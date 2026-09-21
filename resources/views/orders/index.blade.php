
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Management</title>

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
            max-width: 1250px;
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

        /* Success */

        .success-message {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #15803d;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }


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

        .create-button {
            background: #dc2626;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.2s;
        }

        .create-button:hover {
            background: #b91c1c;
        }


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
            min-width: 950px;
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

        /* Order ID */

        .order-id {
            color: #dc2626;
            font-weight: 800;
        }

        .customer-name {
            font-weight: 700;
            color: #1f2937;
        }

        /* Amount */

        .amount {
            font-weight: 700;
            color: #1f2937;
        }

        .discount {
            color: #dc2626;
            font-weight: 600;
        }

        /* Status */

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 800;
        }

        .status-pending {
            background: #fef3c7;
            color: #b45309;
        }

        .status-confirmed {
            background: #dbeafe;
            color: #2563eb;
        }

        .status-shipped {
            background: #ede9fe;
            color: #7c3aed;
        }

        .status-delivered {
            background: #dcfce7;
            color: #15803d;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #dc2626;
        }

        .status-default {
            background: #f3f4f6;
            color: #4b5563;
        }


        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .action-button {
            display: inline-block;
            padding: 7px 11px;
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
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 36px;
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

            .create-button {
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


            <div class="page-header">

                <h1>
                    Order Management
                </h1>

                <p>
                    View and manage customer orders, totals, discounts and order status.
                </p>

            </div>



            @if(session('success'))

                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>

            @endif



            <div class="top-bar">

                <div class="section-title">
                    All Orders
                </div>


                @if(auth()->user()->role === 'admin')

                    <a
                        href="{{ route('admin.orders.create') }}"
                        class="create-button"
                    >
                        + Create New Order
                    </a>

                @else

                    <a
                        href="{{ route('orders.create') }}"
                        class="create-button"
                    >
                        + Create New Order
                    </a>

                @endif

            </div>



            <div class="table-card">

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>ID</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($orders as $order)

                                <tr>

                                    <td>
                                        <span class="order-id">
                                            #{{ $order->id }}
                                        </span>
                                    </td>


                                    <td>

                                        <span class="customer-name">
                                            {{ $order->customer->name }}
                                        </span>

                                    </td>


                                    <td>
                                        {{ $order->order_date }}
                                    </td>


                                    <td>

                                        <span class="amount">
                                            ₹{{ number_format($order->total_amount, 2) }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="discount">
                                            ₹{{ number_format($order->discount, 2) }}
                                        </span>

                                    </td>


                                    <td>

                                        @if($order->status === 'Pending')

                                            <span class="status status-pending">
                                                Pending
                                            </span>

                                        @elseif($order->status === 'Confirmed')

                                            <span class="status status-confirmed">
                                                Confirmed
                                            </span>

                                        @elseif($order->status === 'Shipped')

                                            <span class="status status-shipped">
                                                Shipped
                                            </span>

                                        @elseif($order->status === 'Delivered')

                                            <span class="status status-delivered">
                                                Delivered
                                            </span>

                                        @elseif($order->status === 'Cancelled')

                                            <span class="status status-cancelled">
                                                Cancelled
                                            </span>

                                        @else

                                            <span class="status status-default">
                                                {{ $order->status }}
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        <div class="actions">


                                            @if(auth()->user()->role === 'admin')

                                                <a
                                                    href="{{ route('admin.orders.show', $order->id) }}"
                                                    class="action-button view-button"
                                                >
                                                    View
                                                </a>

                                                <a
                                                    href="{{ route('admin.orders.edit', $order->id) }}"
                                                    class="action-button edit-button"
                                                >
                                                    Edit
                                                </a>

                                                <form
                                                    action="{{ route('admin.orders.destroy', $order->id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-button delete-button"
                                                        onclick="return confirm('Are you sure you want to delete this order?')"
                                                    >
                                                        Delete
                                                    </button>

                                                </form>


                                            @else


                                                <a
                                                    href="{{ route('orders.show', $order->id) }}"
                                                    class="action-button view-button"
                                                >
                                                    View
                                                </a>

                                                <a
                                                    href="{{ route('orders.edit', $order->id) }}"
                                                    class="action-button edit-button"
                                                >
                                                    Edit
                                                </a>

                                                <form
                                                    action="{{ route('orders.destroy', $order->id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-button delete-button"
                                                        onclick="return confirm('Are you sure you want to delete this order?')"
                                                    >
                                                        Delete
                                                    </button>

                                                </form>

                                            @endif


                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="7">

                                        <div class="empty-row">

                                            <div class="empty-icon">
                                                
                                            </div>

                                            <div class="empty-text">
                                                No orders found.
                                            </div>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>



            <div class="footer-actions">

                @if(auth()->user()->role === 'admin')

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="back-button"
                    >
                            Back to Dashboard
                    </a>

                @else

                    <a
                        href="{{ route('customer.dashboard') }}"
                        class="back-button"
                    >
                        Back to Dashboard
                    </a>

                @endif

            </div>


        </div>

    </div>

</body>

</html>
