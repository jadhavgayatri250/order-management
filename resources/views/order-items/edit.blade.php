<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Order Item</title>

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

        .info-box {
            background: #f1f3f5;
            border-left: 4px solid #dc2626;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 13px;
            color: #555;
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

            <h1>Edit Order Item</h1>

            <p>
                Update the product and quantity details of this order item.
            </p>

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


            <div class="info-box">
                Make the required changes and click Update Item to save them.
            </div>


            @if(auth()->user()->role === 'admin')

                <form
                    action="{{ route('admin.order-items.update', $orderItem->id) }}"
                    method="POST"
                >

            @else

                <form
                    action="{{ route('order-items.update', $orderItem->id) }}"
                    method="POST"
                >

            @endif

                @csrf
                @method('PUT')


                <div class="form-group">

                    <label for="order_id">
                        Order
                    </label>

                    <select
                        name="order_id"
                        id="order_id"
                        required
                    >

                        @foreach($orders as $order)

                            <option
                                value="{{ $order->id }}"
                                {{ $orderItem->order_id == $order->id ? 'selected' : '' }}
                            >
                                Order #{{ $order->id }} - {{ $order->customer->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label for="product_name">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="product_name"
                        id="product_name"
                        value="{{ old('product_name', $orderItem->product_name) }}"
                        placeholder="Enter product name"
                        required
                    >

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label for="quantity">
                            Quantity
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            value="{{ old('quantity', $orderItem->quantity) }}"
                            min="1"
                            placeholder="Enter quantity"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="price">
                            Price
                        </label>

                        <input
                            type="number"
                            name="price"
                            id="price"
                            value="{{ old('price', $orderItem->price) }}"
                            step="0.01"
                            min="0"
                            placeholder="Enter price"
                            required
                        >

                    </div>

                </div>


                <div class="button-row">

                    @if(auth()->user()->role === 'admin')

                        <a
                            href="{{ route('admin.order-items.index') }}"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                    @else

                        <a
                            href="{{ route('order-items.index') }}"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                    @endif


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Item
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>