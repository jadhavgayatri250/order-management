
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Order Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: 'Figtree', sans-serif;
        }

        .om-page {
            min-height: 100vh;
            background: #eef2f7;
        }

        /* Top Header */

        .om-header {
            width: 100%;
            height: 82px;
            background: #dc2638;
            display: flex;
            align-items: center;
        }

        .om-header-inner {
            width: 100%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 25px;
        }

        .om-logo {
            color: white !important;
            text-decoration: none !important;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        /* Main Area */

        .om-main {
            min-height: calc(100vh - 82px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 20px;
        }

        /* Card */

        .om-card {
            width: 100%;
            max-width: 505px;
            background: #ffffff;
            border-radius: 22px;
            padding: 42px 48px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
            border: 1px solid #e5e7eb;
        }

        .om-card > div {
            width: 100%;
        }

        /* Responsive */

        @media (max-width: 600px) {

            .om-header {
                height: 70px;
            }

            .om-logo {
                font-size: 26px;
            }

            .om-main {
                min-height: calc(100vh - 70px);
                padding: 25px 15px;
            }

            .om-card {
                padding: 30px 22px;
                border-radius: 18px;
            }
        }
    </style>
</head>

<body>

    <div class="om-page">

        <!-- Header -->
        <header class="om-header">

            <div class="om-header-inner">

                <a href="/" class="om-logo">
                    Order Management
                </a>

            </div>

        </header>

        <!-- Authentication Area -->
        <main class="om-main">

            <div class="om-card">

                {{ $slot }}

            </div>

        </main>

    </div>

</body>

</html>
