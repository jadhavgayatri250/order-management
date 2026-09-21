<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Order</title>

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
            max-width: 700px;
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

        .order-id {
            display: inline-block;
            background: #f1f3f5;
            color: #555;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: #444;
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: #fff;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        select:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.10);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
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
            padding: 12px 20px;
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

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        @media (max-width: 600px) {

            .page {
                padding: 25px 15px;
            }

            .card {
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .button-row {
                flex-direction: column-reverse;
                gap: 12px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="container">

        <div class="header">

            <h1>Edit Order</h1>

            <p>
                Update order information, discount and status.
            </p>

        </div>


        <div class="card">

            <div class="order-id">
                Order #{{ $order->id }}
            </div>


            @if($errors->any())

                <div class="error-box">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            @if(auth()->user()->role === 'admin')

                <form
                    action="{{ route('admin.orders.update', $order->id) }}"
                    method="POST"
                >

            @else

                <form
                    action="{{ route('orders.update', $order->id) }}"
                    method="POST"
                >

            @endif

                @csrf
                @method('PUT')


                @if(auth()->user()->role === 'admin')

                    <div class="form-group">

                        <label for="customer_id">
                            Customer
                        </label>

                        <select
                            name="customer_id"
                            id="customer_id"
                            required
                        >

                            @foreach($customers as $customer)

                                <option
                                    value="{{ $customer->id }}"
                                    {{ $order->customer_id == $customer->id ? 'selected' : '' }}
                                >
                                    {{ $customer->name }} - {{ $customer->email }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                @endif


                <div class="form-row">

                    <div class="form-group">

                        <label for="order_date">
                            Order Date
                        </label>

                        <input
                            type="date"
                            name="order_date"
                            id="order_date"
                            value="{{ $order->order_date }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="discount">
                            Discount
                        </label>

                        <input
                            type="number"
                            name="discount"
                            id="discount"
                            step="0.01"
                            min="0"
                            value="{{ $order->discount }}"
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label for="status">
                        Order Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                    >

                        <option
                            value="Pending"
                            {{ $order->status === 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Confirmed"
                            {{ $order->status === 'Confirmed' ? 'selected' : '' }}
                        >
                            Confirmed
                        </option>

                        <option
                            value="Shipped"
                            {{ $order->status === 'Shipped' ? 'selected' : '' }}
                        >
                            Shipped
                        </option>

                        <option
                            value="Delivered"
                            {{ $order->status === 'Delivered' ? 'selected' : '' }}
                        >
                            Delivered
                        </option>

                        <option
                            value="Cancelled"
                            {{ $order->status === 'Cancelled' ? 'selected' : '' }}
                        >
                            Cancelled
                        </option>

                    </select>

                </div>


                <div class="button-row">

                    @if(auth()->user()->role === 'admin')

                        <a
                            href="{{ route('admin.orders.show', $order->id) }}"
                            class="btn btn-secondary"
                        >
                            ← Back to Order
                        </a>

                    @else

                        <a
                            href="{{ route('orders.show', $order->id) }}"
                            class="btn btn-secondary"
                        >
                            ← Back to Order
                        </a>

                    @endif


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Order
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>