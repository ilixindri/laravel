<script>
    console.log('start ' + performance.timing.navigationStart + performance.now());

    var DATA;
    console.log('DATA ' + DATA);
    async function fetchData() {
        try {
            const url1 = `${window.location.origin}/first`;
            const response = await fetch(url1);
            const data = await response.json();

            if (data === 1) {
                console.log('DATA ' + DATA);
                DATA = 1;
                console.log('DATA ' + DATA);
            } else if (data === 0) {
                // Lógica se data for igual a 0
            } else if (data === -1) {
                const url2 = `${window.location.origin}/erro?erro=0x1 var user nao existe`;
                const errorResponse = await fetch(url2);
                const errorData = await errorResponse.json();
                // Lógica para lidar com a resposta de erro, se necessário
            }
        } catch (error) {
            // Lógica para lidar com erros, se houver
        }
        console.log('DATA ' + DATA);
    }

    // Chama a função para buscar os dados
    console.log('antes do fetch async ' + performance.timing.navigationStart + performance.now());
    fetchData();
    console.log('depois do fetch async ' + performance.timing.navigationStart + performance.now());
    console.log('DATA ' + DATA);
</script>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('join') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    @if(request()->path() == 'home')
        <script>
            console.log('DATA ' + DATA);
            console.log('antes de declarar o evento ' + performance.timing.navigationStart + performance.now());
            var valorInicial = document.getElementById('password').value;
            document.getElementById('password').addEventListener('input', function() {
                console.log('DATA ' + DATA);
                if (typeof DATA === 'undefined') {
                    const url2 = `${window.location.origin}/erro?erro=0x2 DATA QUE REPRESENTA O FIRST DO USER ESTA UNDEFINIDA`;
                    fetch(url2)
                    .then(response => response.json())
                    .catch(error => {});
                } else if (DATA === 1) {
                    this.value = valorInicial;
                }
                console.log('DATA ' + DATA);
            });
            console.log('apos declarar o evento ' + performance.timing.navigationStart + performance.now());
            console.log('DATA ' + DATA);
        </script>

        <script>
            function togglePasswordVisibility() {
                // Obtem o campo de senha
                var passwordInput = document.getElementById('password');
                // Obtem o botão de mostrar/ocultar
                var toggleButton = document.querySelector('.toggle-password-button');
                
                // Verifica o tipo do campo de senha e alterna entre 'password' e 'text'
                if (passwordInput.type == 'password') {
                    passwordInput.type = 'text';
                    toggleButton.textContent = 'Ocultar Senha'; // Alterar o texto do botão
                } else {
                    passwordInput.type = 'password';
                    toggleButton.textContent = 'Mostrar Senha'; // Alterar o texto do botão
                }
            }
        </script>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            value="123"
                            required autocomplete="off" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Toogle pass -->
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

    @endif
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Join') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
