@auth
    <form method="GET" action="/send/email">
        @csrf
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Login in new account.') }}
            </x-primary-button>
        </div>
    </form>
    <form method="GET" action="/send/email">
        @csrf
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Continue logged in account') }} {{ Auth::user()->mail }}.
            </x-primary-button>
        </div>
    </form>
@else
	
@endauth