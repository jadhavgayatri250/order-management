<x-guest-layout>

    <div class="mb-6 text-center">

        <h2 class="text-3xl font-bold text-red-600">
            Reset Your Password
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            Forgot your password? No problem.
        </p>

        <p class="text-sm text-gray-500">
            Enter your email and we'll send you a reset link.
        </p>

    </div>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('password.email') }}">

        @csrf

        <div>

            <x-input-label
                for="email"
                :value="__('Email Address')"
                class="text-gray-700 font-semibold"
            />

            <x-text-input
                id="email"
                class="block mt-2 w-full border-gray-300 rounded-xl
                    focus:border-red-500 focus:ring-red-500"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Enter your email"
                required
                autofocus
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>

        <div class="flex items-center justify-between mt-6">

            <a
                href="{{ route('login') }}"
                class="text-sm text-gray-600 hover:text-red-600 transition"
            >
                Back to Login
            </a>

            <button
                type="submit"
                class="px-6 py-3 bg-red-600 text-white font-semibold
                    rounded-xl shadow-md
                    hover:bg-red-700
                    focus:outline-none
                    focus:ring-2 focus:ring-red-500
                    focus:ring-offset-2
                    transition"
            >
                Send Reset Link
            </button>

        </div>

    </form>

</x-guest-layout>