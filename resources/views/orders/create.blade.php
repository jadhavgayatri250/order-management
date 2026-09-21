<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Place New Order</title>

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

        .customer-info {
            background: #f1f3f5;
            border-left: 4px solid #dc2626;
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 14px;
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
            color: white;
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
            <h1>Place New Order</h1>
            <p>Create a new order and manage its details.</p>
        </div>

        <div class="card">

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

                <form action="{{ route('admin.orders.store') }}" method="POST">

            @else

                <div class="customer-info">
                    Customer:
                    <strong>{{ auth()->user()->name }}</strong>
                </div>

                <form action="{{ route('orders.store') }}" method="POST">

            @endif

                @csrf


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

                            <option value="">
                                Select Customer
                            </option>

                            @foreach($customers as $customer)

                                <option
                                    value="{{ $customer->id }}"
                                    {{ old('customer_id') == $customer->id ? 'selected' : '' }}
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
                            value="{{ old('order_date', date('Y-m-d')) }}"
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
                            value="{{ old('discount', 0) }}"
                            placeholder="Enter discount"
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

                        <option value="Pending"
                            {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Confirmed"
                            {{ old('status') == 'Confirmed' ? 'selected' : '' }}>
                            Confirmed
                        </option>

                        <option value="Shipped"
                            {{ old('status') == 'Shipped' ? 'selected' : '' }}>
                            Shipped
                        </option>

                        <option value="Delivered"
                            {{ old('status') == 'Delivered' ? 'selected' : '' }}>
                            Delivered
                        </option>

                        <option value="Cancelled"
                            {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>

                </div>


                <div class="button-row">

                    @if(auth()->user()->role === 'admin')

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="btn btn-secondary"
                        >
                            Back to Orders
                        </a>

                    @else

                        <a
                            href="{{ route('customer.dashboard') }}"
                            class="btn btn-secondary"
                        >
                            Back to Dashboard
                        </a>

                    @endif


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Place Order
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>