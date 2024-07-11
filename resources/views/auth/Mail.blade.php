<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form><!-- method="POST" action="/transfer/pass/auth">-->
        @csrf

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="Mail" :value="__('Mail')" />

            <x-text-input id="Mail" class="block mt-1 w-full"
                            type="text"
                            name="Mail"
                            value="user@name.tld"
                            required autocomplete="off" />
            <x-input-error :messages="$errors->get('Mail')" class="mt-2" />

        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Send') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
