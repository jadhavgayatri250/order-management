
<x-guest-layout>

    <div style="text-align:center; margin-bottom:28px;">

        <h2 style="
            margin:0;
            font-size:32px;
            font-weight:700;
            color:#dc2638;
        ">
            Create Account
        </h2>

        <p style="
            margin-top:8px;
            color:#64748b;
            font-size:14px;
        ">
            Register to manage your orders
        </p>

    </div>


    <form method="POST" action="{{ route('register') }}">

        @csrf


        <!-- Name -->

        <div>

            <x-input-label
                for="name"
                :value="__('Name')"
            />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Enter your name"
            />

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2"
            />

        </div>


        <!-- Email -->

        <div class="mt-5">

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
                autocomplete="new-password"
                placeholder="Create a password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>


        <!-- Confirm Password -->

        <div class="mt-5">

            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirm your password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>


        <!-- Register Button -->

        <div style="
            margin-top:28px;
            display:flex;
            align-items:center;
            justify-content:flex-end;
            gap:15px;
        ">

            <a
                href="{{ route('login') }}"
                style="
                    color:#64748b;
                    font-size:14px;
                    text-decoration:none;
                    font-weight:500;
                "
            >
                Already registered?
            </a>

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
                REGISTER
            </button>

        </div>

    </form>

</x-guest-layout>
