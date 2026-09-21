<x-guest-layout>

    <div class="mb-6 text-center">

        <h2 class="text-3xl font-bold text-red-600">
            Reset Password
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            Create a new password for your account
        </p>

    </div>

    <form method="POST" action="{{ route('password.store') }}">

        @csrf

        <!-- Password Reset Token -->
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        >

        <!-- Email Address -->
        <div>

            <x-input-label
                for="email"
                :value="__('Email Address')"
                class="font-semibold text-gray-700"
            />

            <x-text-input
                id="email"
                class="block mt-2 w-full rounded-xl border-gray-300
                       focus:border-red-500 focus:ring-red-500"
                type="email"
                name="email"
                :value="old('email', $request->email)"
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
                :value="__('New Password')"
                class="font-semibold text-gray-700"
            />

            <x-text-input
                id="password"
                class="block mt-2 w-full rounded-xl border-gray-300
                       focus:border-red-500 focus:ring-red-500"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Create a new password"
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
                class="font-semibold text-gray-700"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-2 w-full rounded-xl border-gray-300
                       focus:border-red-500 focus:ring-red-500"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirm your new password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        <!-- Reset Button -->
        <div class="mt-7">

            <button
                type="submit"
                class="w-full py-3 px-6 bg-red-600 text-white
                    font-semibold rounded-xl shadow-md
                    hover:bg-red-700
                    focus:outline-none
                    focus:ring-2 focus:ring-red-500
                    focus:ring-offset-2
                    transition duration-200"
            >
                Reset Password
            </button>

        </div>

    </form>

</x-guest-layout>