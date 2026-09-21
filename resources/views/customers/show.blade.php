
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Details</title>

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
            max-width: 900px;
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

        /* Details Card */

        .details-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .card-heading {
            padding: 22px 25px;
            border-bottom: 1px solid #e5e7eb;
            background: #fafafa;
        }

        .card-heading h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            color: #1f2937;
        }

        .card-heading p {
            margin: 5px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        /* Information */

        .details-body {
            padding: 25px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .detail-item {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 18px;
        }

        .detail-item.full-width {
            grid-column: 1 / -1;
        }

        .detail-label {
            font-size: 12px;
            font-weight: 800;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .detail-value {
            margin-top: 7px;
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            word-break: break-word;
        }

        .customer-id {
            color: #dc2626;
        }

        .empty-value {
            color: #9ca3af;
            font-weight: 500;
        }

        /* Actions */

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 25px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
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

        .edit-button {
            display: inline-block;
            background: #dc2626;
            color: white;
            padding: 12px 21px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.2s;
        }

        .edit-button:hover {
            background: #b91c1c;
        }

        /* Responsive */

        @media (max-width: 650px) {

            .page {
                padding: 25px 15px 45px;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .detail-item.full-width {
                grid-column: auto;
            }

            .actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .back-button,
            .edit-button {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</head>


<body>

    <div class="page">

        <div class="container">


            <!-- Header -->

            <div class="page-header">

                <h1>
                    Customer Details
                </h1>

                <p>
                    View complete information about this customer.
                </p>

            </div>


            <!-- Details Card -->

            <div class="details-card">


                <div class="card-heading">

                    <h2>
                        Customer Information
                    </h2>

                    <p>
                        Customer ID #{{ $customer->id }}
                    </p>

                </div>


                <div class="details-body">

                    <div class="details-grid">


                        <!-- ID -->

                        <div class="detail-item">

                            <div class="detail-label">
                                Customer ID
                            </div>

                            <div class="detail-value customer-id">
                                #{{ $customer->id }}
                            </div>

                        </div>


                        <!-- Name -->

                        <div class="detail-item">

                            <div class="detail-label">
                                Name
                            </div>

                            <div class="detail-value">
                                {{ $customer->name }}
                            </div>

                        </div>


                        <!-- Email -->

                        <div class="detail-item">

                            <div class="detail-label">
                                Email
                            </div>

                            <div class="detail-value">
                                {{ $customer->email }}
                            </div>

                        </div>


                        <!-- Phone -->

                        <div class="detail-item">

                            <div class="detail-label">
                                Phone
                            </div>

                            <div class="detail-value">

                                @if($customer->phone)
                                    {{ $customer->phone }}
                                @else
                                    <span class="empty-value">
                                        Not provided
                                    </span>
                                @endif

                            </div>

                        </div>


                        <!-- Address -->

                        <div class="detail-item full-width">

                            <div class="detail-label">
                                Address
                            </div>

                            <div class="detail-value">

                                @if($customer->address)
                                    {{ $customer->address }}
                                @else
                                    <span class="empty-value">
                                        Address not provided
                                    </span>
                                @endif

                            </div>

                        </div>


                    </div>


                    <!-- Actions -->

                    <div class="actions">

                        <a
                            href="{{ route('admin.customers.index') }}"
                            class="back-button"
                        >
                            ← Back to Customers
                        </a>

                        <a
                            href="{{ route('admin.customers.edit', $customer->id) }}"
                            class="edit-button"
                        >
                            Edit Customer
                        </a>

                    </div>


                </div>

            </div>


        </div>

    </div>

</body>

</html>
