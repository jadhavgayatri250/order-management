<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Delivered Orders</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            color: #333;
        }

        .page {
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1150px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            color: #222;
        }

        .header p {
            margin-top: 8px;
            color: #777;
            font-size: 14px;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            background: #f8f9fa;
            color: #555;
            font-size: 13px;
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .order-id {
            font-weight: 700;
            color: #222;
        }

        .customer-name {
            font-weight: 600;
            color: #333;
        }

        .amount {
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #d1fae5;
            color: #065f46;
            font-size: 12px;
            font-weight: 700;
        }

        .view-link {
            display: inline-block;
            text-decoration: none;
            background: #dc2626;
            color: #fff;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .view-link:hover {
            background: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #777;
        }

        .bottom-action {
            margin-top: 20px;
        }

        .back-btn {
            display: inline-block;
            text-decoration: none;
            background: #f1f3f5;
            color: #444;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #e5e7eb;
        }

        @media (max-width: 700px) {

            .page {
                padding: 25px 15px;
            }

            .card {
                padding: 18px;
            }

            .header h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="container">

        <div class="header">

            <h1>Delivered Orders</h1>

            <p>
                View orders that have been successfully delivered to customers.
            </p>

        </div>


        <div class="card">

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Order Date</th>
                            <th>Total Amount</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
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


                                <td class="amount">
                                    ₹{{ number_format($order->total_amount, 2) }}
                                </td>


                                <td class="amount">
                                    ₹{{ number_format($order->discount, 2) }}
                                </td>


                                <td>

                                    <span class="status">
                                        {{ $order->status }}
                                    </span>

                                </td>


                                <td>

                                    <a
                                        href="{{ route('admin.orders.show', $order->id) }}"
                                        class="view-link"
                                    >
                                        View Order
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="empty"
                                >
                                    No delivered orders found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <div class="bottom-action">

            <a
                href="{{ route('admin.dashboard') }}"
                class="back-btn"
            >
                ← Back to Dashboard
            </a>

        </div>

    </div>

</div>

</body>

</html>