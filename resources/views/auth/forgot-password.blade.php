<x-guest-layout>
    <h2 class="text-xl font-display font-bold text-white mb-4 text-center">Reset Password</h2>

    <p class="mb-6 text-sm text-gray-400 text-center">
        Enter your email address and we'll send you a password reset link.
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <button type="submit" class="btn-primary w-full text-center mt-6 py-3">
            Send Reset Link
        </button>
    </form>

    <p class="text-center mt-4 text-sm">
        <a href="{{ route('login') }}" class="text-primary-400 hover:text-primary-300 transition-colors">Back to login</a>
    </p>
</x-guest-layout>
