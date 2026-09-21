
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Customer</title>

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
            max-width: 850px;
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

        /* Form Card */

        .form-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #eeeeee;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
            padding: 30px;
        }

        .form-title {
            font-size: 21px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #374151;
        }

        .required {
            color: #dc2626;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 14px;
            color: #1f2937;
            background: #ffffff;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.10);
        }

        textarea.form-control {
            min-height: 110px;
            resize: vertical;
        }

        .error-message {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
            font-weight: 600;
        }

        /* Buttons */

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 28px;
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

        .save-button {
            background: #dc2626;
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .save-button:hover {
            background: #b91c1c;
        }

        /* Responsive */

        @media (max-width: 600px) {

            .page {
                padding: 25px 15px 45px;
            }

            .form-card {
                padding: 22px;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .back-button,
            .save-button {
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
                    Add New Customer
                </h1>

                <p>
                    Enter customer details to create a new customer record.
                </p>

            </div>


            <!-- Form -->

            <div class="form-card">

                <div class="form-title">
                    Customer Information
                </div>


                <form action="{{ route('admin.customers.store') }}" method="POST">

                    @csrf


                    <!-- Name -->

                    <div class="form-group">

                        <label for="name">
                            Name <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="Enter customer name"
                            required
                        >

                        @error('name')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Email -->

                    <div class="form-group">

                        <label for="email">
                            Email <span class="required">*</span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="Enter customer email"
                            required
                        >

                        @error('email')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Phone -->

                    <div class="form-group">

                        <label for="phone">
                            Phone
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                            placeholder="Enter phone number"
                        >

                        @error('phone')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Address -->

                    <div class="form-group">

                        <label for="address">
                            Address
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            class="form-control"
                            placeholder="Enter customer address"
                        >{{ old('address') }}</textarea>

                        @error('address')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- Actions -->

                    <div class="form-actions">

                        <a
                            href="{{ route('admin.customers.index') }}"
                            class="back-button"
                        >
                            ← Back to Customers
                        </a>

                        <button
                            type="submit"
                            class="save-button"
                        >
                            Save Customer
                        </button>

                    </div>

                </form>

            </div>


        </div>

    </div>

</body>

</html>
