
<x-guest-layout>

    <div style="
        text-align:center;
        margin-bottom:30px;
    ">

        <h2 style="
            margin:0;
            font-size:32px;
            font-weight:700;
            color:#dc2638;
        ">
            Login
        </h2>

        <p style="
            margin-top:8px;
            color:#64748b;
            font-size:14px;
        ">
            Welcome back to Order Management
        </p>

    </div>



    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />


    <form method="POST" action="{{ route('login') }}">

        @csrf



        <div>

            <x-input-label
                for="email"
                :value="__('Email')"
            />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>


        <!-- Password -->

        <div class="mt-5">

            <x-input-label
                for="password"
                :value="__('Password')"
            />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>



        <div class="block mt-5">

            <label
                for="remember_me"
                class="inline-flex items-center"
            >

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>

            </label>

        </div>



        <div style="
            margin-top:25px;
            display:flex;
            align-items:center;
            justify-content:flex-end;
            gap:15px;
        ">

            @if (Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    style="
                        color:#dc2638;
                        font-size:14px;
                        text-decoration:none;
                        font-weight:500;
                    "
                >
                    {{ __('Forgot your password?') }}
                </a>

            @endif


            <button
                type="submit"
                style="
                    background:#dc2638;
                    color:white;
                    border:none;
                    padding:11px 28px;
                    border-radius:8px;
                    font-size:15px;
                    font-weight:600;
                    cursor:pointer;
                "
            >
                LOG IN
            </button>

        </div>

    </form>



    @if (Route::has('register'))

        <div style="
            margin-top:28px;
            padding-top:22px;
            border-top:1px solid #e5e7eb;
            text-align:center;
        ">

            <span style="
                color:#64748b;
                font-size:14px;
            ">
                Don't have an account?
            </span>

            <a
                href="{{ route('register') }}"
                style="
                    color:#dc2638;
                    font-size:14px;
                    font-weight:600;
                    text-decoration:none;
                    margin-left:5px;
                "
            >
                Register
            </a>

        </div>

    @endif

</x-guest-layout>
