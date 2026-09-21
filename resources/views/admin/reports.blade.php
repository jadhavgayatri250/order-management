
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reports</title>
</head>

<body>

    <h1>Order Management Reports</h1>

    <hr>

    <h2>Summary</h2>

    <p>
        <strong>Total Customers:</strong>
        {{ $totalCustomers }}
    </p>

    <p>
        <strong>Total Orders:</strong>
        {{ $totalOrders }}
    </p>

    <p>
        <strong>Pending Orders:</strong>
        {{ $pendingOrders }}
    </p>

    <p>
        <strong>Confirmed Orders:</strong>
        {{ $confirmedOrders }}
    </p>

    <p>
        <strong>Shipped Orders:</strong>
        {{ $shippedOrders }}
    </p>

    <p>
        <strong>Delivered Orders:</strong>
        {{ $deliveredOrders }}
    </p>

    <p>
        <strong>Cancelled Orders:</strong>
        {{ $cancelledOrders }}
    </p>

    <p>
        <strong>Total Sales:</strong>
        ₹{{ number_format($totalSales, 2) }}
    </p>

    <br>

    <a href="{{ route('admin.dashboard') }}">
        Back to Dashboard
    </a>

</body>

</html>
