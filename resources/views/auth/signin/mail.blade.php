<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="GET" action="/transfer/mail">
        <!-- @csrf -->

        <!-- Email Address -->
        <div>
            <x-input-label for="mail" :value="__('Mail')" />
            <x-text-input id="mail" class="block mt-1 w-full" type="email" name="mail" :value="old('mail')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('mail')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Send') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
