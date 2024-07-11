<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="/transfer/pass/register">
        @csrf

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="pass"
                            value="123"
                            required autocomplete="off" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Toogle pass -->
			<script>
				function togglePasswordVisibility() {
					var passwordInput = document.getElementById('password');
					if (passwordInput.type == 'password') {
						passwordInput.type = 'text';
					} else {
						passwordInput.type = 'password';
					}
				}
			</script>
            <div class="block mt-4">
                <label for="toogle_pass_id" class="inline-flex items-center">
                    <input id="toogle_pass_id" type="checkbox" onclick="togglePasswordVisibility()" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="toogle_pass">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Toogle password') }}</span>
                </label>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Send') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
