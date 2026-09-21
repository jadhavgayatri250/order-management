<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Details</title>

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
            max-width: 1000px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            color: #222;
        }

        .header p {
            margin: 7px 0 0;
            color: #777;
            font-size: 14px;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .order-info {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .info-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 16px;
        }

        .info-label {
            display: block;
            color: #777;
            font-size: 12px;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #222;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-shipped {
            background: #e0e7ff;
            color: #3730a3;
        }

        .status-delivered {
            background: #d1fae5;
            color: #065f46;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .section-title h2 {
            margin: 0;
            font-size: 20px;
            color: #222;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary {
            background: #dc2626;
            color: #fff;
        }

        .btn-primary:hover {
            background: #b91c1c;
        }

        .btn-secondary {
            background: #f1f3f5;
            color: #444;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
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
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        .summary {
            margin-left: auto;
            max-width: 360px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .discount {
            color: #16a34a;
        }

        .final-row {
            margin-top: 8px;
            padding-top: 15px;
            border-top: 2px solid #ddd;
            font-size: 18px;
            font-weight: 700;
            color: #222;
        }

        .bottom-action {
            margin-top: 20px;
        }

        @media (max-width: 800px) {

            .order-info {
                grid-template-columns: repeat(2, 1fr);
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 500px) {

            .page {
                padding: 25px 15px;
            }

            .card {
                padding: 18px;
            }

            .order-info {
                grid-template-columns: 1fr;
            }

            .section-title {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .summary {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="container">

        <div class="header">

            <div>
                <h1>Order Details</h1>
                <p>View order information, items and payment summary.</p>
            </div>

            @if(auth()->user()->role === 'admin')

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="btn btn-secondary"
                >
                    Back to Orders
                </a>

            @else

                <a
                    href="{{ route('orders.index') }}"
                    class="btn btn-secondary"
                >
                    Back to Orders
                </a>

            @endif

        </div>

        <div class="card">

            <div class="order-info">

                <div class="info-box">

                    <span class="info-label">
                        Order ID
                    </span>

                    <span class="info-value">
                        #{{ $order->id }}
                    </span>

                </div>


                <div class="info-box">

                    <span class="info-label">
                        Customer
                    </span>

                    <span class="info-value">
                        {{ $order->customer->name }}
                    </span>

                </div>


                <div class="info-box">

                    <span class="info-label">
                        Order Date
                    </span>

                    <span class="info-value">
                        {{ $order->order_date }}
                    </span>

                </div>


                <div class="info-box">

                    <span class="info-label">
                        Status
                    </span>

                    <span class="status
                        @if($order->status === 'Pending') status-pending
                        @elseif($order->status === 'Confirmed') status-confirmed
                        @elseif($order->status === 'Shipped') status-shipped
                        @elseif($order->status === 'Delivered') status-delivered
                        @elseif($order->status === 'Cancelled') status-cancelled
                        @endif
                    ">
                        {{ $order->status }}
                    </span>

                </div>

            </div>

        </div>


        <div class="card">

            <div class="section-title">

                <h2>Order Items</h2>

                @if(auth()->user()->role === 'admin')

                    <a
                        href="{{ route('admin.order-items.create', ['order_id' => $order->id]) }}"
                        class="btn btn-primary"
                    >
                        + Add Order Item
                    </a>

                @else

                    <a
                        href="{{ route('order-items.create', ['order_id' => $order->id]) }}"
                        class="btn btn-primary"
                    >
                        + Add Order Item
                    </a>

                @endif

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($order->orderItems as $item)

                            <tr>

                                <td>
                                    <strong>
                                        {{ $item->product_name }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $item->quantity }}
                                </td>

                                <td>
                                    ₹{{ number_format($item->price, 2) }}
                                </td>

                                <td>
                                    <strong>
                                        ₹{{ number_format($item->subtotal, 2) }}
                                    </strong>
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="empty"
                                >
                                    No items added to this order.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <div class="card">

            <div class="section-title">

                <h2>Order Summary</h2>

            </div>


            <div class="summary">

                <div class="summary-row">

                    <span>
                        Total Amount
                    </span>

                    <strong>
                        ₹{{ number_format($order->total_amount, 2) }}
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        Discount
                    </span>

                    <strong class="discount">
                        - ₹{{ number_format($order->discount, 2) }}
                    </strong>

                </div>


                <div class="summary-row final-row">

                    <span>
                        Final Amount
                    </span>

                    <strong>
                        ₹{{ number_format(max($order->total_amount - $order->discount, 0), 2) }}
                    </strong>

                </div>

            </div>

        </div>


        <div class="bottom-action">

            @if(auth()->user()->role === 'admin')

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="btn btn-secondary"
                >
                    Back to Orders
                </a>

            @else

                <a
                    href="{{ route('orders.index') }}"
                    class="btn btn-secondary"
                >
                    Back to Orders
                </a>

            @endif

        </div>

    </div>

</div>

</body>

</html>