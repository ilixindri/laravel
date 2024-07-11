<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
	<div>
		<x-input-label for="mail" :value="__('Mail')" />
		<x-text-input id="mail" class="block mt-1 w-full" type="email" name="mail" :value="old('mail')" required autofocus autocomplete="username" />
		<x-input-error :messages="$errors->get('mail')" class="mt-2" />
	</div>

	<div class="flex items-center justify-end mt-4">
		<x-primary-button class="ms-3" onclick="sendMail()">
			{{ __('Send') }}
		</x-primary-button>
	</div>
	<script>
		function sendMail(event) {
			const data = {
        		mail: document.getElementById('mail').value,
        		figerprint: figerPrint(),
			};
			post('/mail', data)
			get('/pass')
		}
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/2.1.0/fingerprint2.min.js"></script>
	<script src="{{ asset('js/Get.js') }}"></script>
	<script src="{{ asset('js/FingerPrint.js') }}"></script>
	
</x-guest-layout>
