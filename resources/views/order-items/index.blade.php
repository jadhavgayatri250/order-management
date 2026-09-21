<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Items</title>

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
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
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

        .product-name {
            font-weight: 600;
            color: #222;
        }

        .order-badge {
            display: inline-block;
            background: #f1f3f5;
            color: #555;
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
        }

        .price {
            white-space: nowrap;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .action-link {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .view {
            background: #f1f3f5;
            color: #444;
        }

        .view:hover {
            background: #e5e7eb;
        }

        .edit {
            background: #fff3cd;
            color: #856404;
        }

        .edit:hover {
            background: #ffe69c;
        }

        .delete {
            background: #fee2e2;
            color: #991b1b;
            border: none;
        }

        .delete:hover {
            background: #fecaca;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #777;
        }

        .bottom-action {
            margin-top: 20px;
        }

        @media (max-width: 700px) {

            .page {
                padding: 25px 15px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="container">

        <div class="header">

            <div>

                <h1>Order Items</h1>

                <p>
                    Manage products and items added to customer orders.
                </p>

            </div>


            @if(auth()->user()->role === 'admin')

                <a
                    href="{{ route('admin.order-items.create') }}"
                    class="btn btn-primary"
                >
                        Add Order Item
                </a>

            @else

                <a
                    href="{{ route('order-items.create') }}"
                    class="btn btn-primary"
                >
                        Add Order Item
                </a>

            @endif

        </div>


        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        <div class="card">

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Order</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($orderItems as $item)

                            <tr>

                                <td>
                                    #{{ $item->id }}
                                </td>


                                <td>

                                    <span class="order-badge">
                                        Order #{{ $item->order_id }}
                                    </span>

                                </td>


                                <td>

                                    <span class="product-name">
                                        {{ $item->product_name }}
                                    </span>

                                </td>


                                <td>
                                    {{ $item->quantity }}
                                </td>


                                <td class="price">
                                    ₹{{ number_format($item->price, 2) }}
                                </td>


                                <td class="price">

                                    <strong>
                                        ₹{{ number_format($item->subtotal, 2) }}
                                    </strong>

                                </td>


                                <td>

                                    <div class="actions">

                                        @if(auth()->user()->role === 'admin')

                                            <a
                                                href="{{ route('admin.order-items.show', $item->id) }}"
                                                class="action-link view"
                                            >
                                                View
                                            </a>

                                            <a
                                                href="{{ route('admin.order-items.edit', $item->id) }}"
                                                class="action-link edit"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('admin.order-items.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this order item?');"
                                                style="display:inline;"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-link delete"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        @else

                                            <a
                                                href="{{ route('order-items.show', $item->id) }}"
                                                class="action-link view"
                                            >
                                                View
                                            </a>

                                            <a
                                                href="{{ route('order-items.edit', $item->id) }}"
                                                class="action-link edit"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('order-items.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this order item?');"
                                                style="display:inline;"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-link delete"
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

                                <td
                                    colspan="7"
                                    class="empty"
                                >
                                    No order items found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

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