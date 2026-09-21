<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Management System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fff1f2, #f8fafc);
            color: #222;
        }

        .page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .card {
            width: 100%;
            max-width: 620px;
            background: #ffffff;
            padding: 55px 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.10);
        }

        .icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 22px;
            background: #dc2626;
            color: #fff;
            border-radius: 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 28px;
            font-weight: bold;

            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.25);
        }

        h1 {
            margin: 0;
            font-size: 34px;
            color: #222;
        }

        .subtitle {
            margin: 12px 0 32px;
            color: #777;
            font-size: 16px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .btn {
            min-width: 130px;
            padding: 13px 24px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .login {
            background: #dc2626;
            color: #fff;
        }

        .login:hover {
            background: #b91c1c;
            transform: translateY(-2px);
        }

        .register {
            background: #fff;
            color: #dc2626;
            border: 1px solid #dc2626;
        }

        .register:hover {
            background: #fef2f2;
            transform: translateY(-2px);
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #aaa;
        }

        @media (max-width: 500px) {

            .page {
                padding: 15px;
            }

            .card {
                padding: 40px 20px;
            }

            h1 {
                font-size: 27px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="card">

        <div class="icon">
            OM
        </div>


        <h1>
            Order Management System
        </h1>


        <p class="subtitle">
            Manage Customers & Orders
        </p>


        <div class="buttons">

            @auth

                @if(auth()->user()->role === 'admin')

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="btn login"
                    >
                        Admin Dashboard
                    </a>

                @else

                    <a
                        href="{{ route('customer.dashboard') }}"
                        class="btn login"
                    >
                        Customer Dashboard
                    </a>

                @endif

            @else

                <a
                    href="{{ route('login') }}"
                    class="btn login"
                >
                    Login
                </a>

                <a
                    href="{{ route('register') }}"
                    class="btn register"
                >
                    Register
                </a>

            @endauth

        </div>


        <div class="footer">
            Laravel + MySQL
        </div>

    </div>

</div>

</body>

</html>