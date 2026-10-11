<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reports</title>


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        h1 {
            margin: 0;
            padding: 25px;
            background: #dc2626;
            color: white;
            border-radius: 14px;
            font-size: 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        hr {
            display: none;
        }

        h2 {
            margin-top: 30px;
            margin-bottom: 20px;
            color: #111827;
            font-size: 22px;
        }

        p {
            display: inline-block;
            width: 23%;
            min-width: 200px;
            margin: 8px 1% 8px 0;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
            font-size: 15px;
        }

        p strong {
            display: block;
            margin-bottom: 10px;
            color: #6b7280;
            font-size: 14px;
        }

        p:last-of-type {
            border-left: 5px solid #16a34a;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 22px;
            background: #dc2626;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
        }

        a:hover {
            background: #b91c1c;
        }

        @media (max-width: 900px) {

            p {
                width: 47%;
            }

        }

        @media (max-width: 600px) {

            body {
                padding: 20px;
            }

            p {
                width: 100%;
                margin-right: 0;
            }

            h1 {
                font-size: 24px;
            }

        }

    </style>

</head>


<body>


    <h1>
        Order Management Reports
    </h1>


    <hr>


    <h2>
        Summary
    </h2>


    <p>
        <strong>
            Total Customers:
        </strong>

        {{ $totalCustomers }}
    </p>


    <p>
        <strong>
            Total Orders:
        </strong>

        {{ $totalOrders }}
    </p>


    <p>
        <strong>
            Pending Orders:
        </strong>

        {{ $pendingOrders }}
    </p>


    <p>
        <strong>
            Confirmed Orders:
        </strong>

        {{ $confirmedOrders }}
    </p>


    <p>
        <strong>
            Shipped Orders:
        </strong>

        {{ $shippedOrders }}
    </p>


    <p>
        <strong>
            Delivered Orders:
        </strong>

        {{ $deliveredOrders }}
    </p>


    <p>
        <strong>
            Cancelled Orders:
        </strong>

        {{ $cancelledOrders }}
    </p>


    <p>
        <strong>
            Total Sales:
        </strong>

        ₹{{ number_format($totalSales, 2) }}
    </p>


    <br>


    <a href="{{ route('admin.dashboard') }}">
        Back to Dashboard
    </a>


</body>

</html>