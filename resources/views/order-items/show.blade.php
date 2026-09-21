<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Item Details</title>

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
            max-width: 750px;
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
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .item-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding-bottom: 18px;
            border-bottom: 1px solid #eee;
        }

        .item-title h2 {
            margin: 0;
            font-size: 22px;
            color: #222;
        }

        .order-badge {
            background: #f1f3f5;
            color: #555;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .detail-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 16px;
        }

        .detail-label {
            display: block;
            color: #777;
            font-size: 12px;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .detail-value {
            font-size: 16px;
            font-weight: 600;
            color: #222;
        }

        .subtotal-box {
            margin-top: 18px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .subtotal-label {
            font-weight: 600;
            color: #555;
        }

        .subtotal-value {
            font-size: 20px;
            font-weight: 700;
            color: #dc2626;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 14px;
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

        @media (max-width: 600px) {

            .page {
                padding: 25px 15px;
            }

            .card {
                padding: 20px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .item-title {
                flex-direction: column;
                align-items: flex-start;
            }

            .button-row {
                flex-direction: column-reverse;
                gap: 12px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .subtotal-box {
                gap: 10px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="container">

        <div class="header">

            <h1>Order Item Details</h1>

            <p>
                View product and order item information.
            </p>

        </div>


        <div class="card">

            <div class="item-title">

                <h2>
                    {{ $orderItem->product_name }}
                </h2>

                <span class="order-badge">
                    Order #{{ $orderItem->order_id }}
                </span>

            </div>


            <div class="details">

                <div class="detail-box">

                    <span class="detail-label">
                        Order ID
                    </span>

                    <span class="detail-value">
                        #{{ $orderItem->order_id }}
                    </span>

                </div>


                <div class="detail-box">

                    <span class="detail-label">
                        Customer
                    </span>

                    <span class="detail-value">
                        {{ $orderItem->order->customer->name }}
                    </span>

                </div>


                <div class="detail-box">

                    <span class="detail-label">
                        Product Name
                    </span>

                    <span class="detail-value">
                        {{ $orderItem->product_name }}
                    </span>

                </div>


                <div class="detail-box">

                    <span class="detail-label">
                        Quantity
                    </span>

                    <span class="detail-value">
                        {{ $orderItem->quantity }}
                    </span>

                </div>


                <div class="detail-box">

                    <span class="detail-label">
                        Price
                    </span>

                    <span class="detail-value">
                        ₹{{ number_format($orderItem->price, 2) }}
                    </span>

                </div>

            </div>


            <div class="subtotal-box">

                <span class="subtotal-label">
                    Subtotal
                </span>

                <span class="subtotal-value">
                    ₹{{ number_format($orderItem->subtotal, 2) }}
                </span>

            </div>


            <div class="button-row">

                @if(auth()->user()->role === 'admin')

                    <a
                        href="{{ route('admin.order-items.index') }}"
                        class="btn btn-secondary"
                    >
                            Back to Order Items
                    </a>

                    <a
                        href="{{ route('admin.order-items.edit', $orderItem->id) }}"
                        class="btn btn-primary"
                    >
                        Edit Order Item
                    </a>

                @else

                    <a
                        href="{{ route('order-items.index') }}"
                        class="btn btn-secondary"
                    >
                        Back to Order Items
                    </a>

                    <a
                        href="{{ route('order-items.edit', $orderItem->id) }}"
                        class="btn btn-primary"
                    >
                        Edit Order Item
                    </a>

                @endif

            </div>

        </div>

    </div>

</div>

</body>

</html>