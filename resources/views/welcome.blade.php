<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head', ['modules' => $modules])
    <body class="antialiased" onkeydown="handlePressEnter()">
        @include('layouts.mouse-menu')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div id="menu" class="fixed-top d-flex justify-content-end m-2" style="background-color: #ecf0f1;">
                <div class="inline-flex" id="auth" style="cursor: pointer">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-decoration-none text-reset text-primary-emphasis hc">{{ __('Dashboard') }}</a>
                    @else
                        <a id="enter" class="p-3 border-0 h button" href="{{ route('dashboard') }}" onclick="window.location.href='{{ route('dashboard') }}'" type="button" aria-expanded="false">
                            {{ __('Enter') }}
                        </a>
                    @endauth
                </div>
                <button class="dropdown-toggle p-3 border-0 h" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div id="content" style="text-align: center;" class="max-w-7xl mx-auto p-6 lg:p-8">
                <h1>{{ __('System Creator') }}</h1>
                <div class="flex justify-center">
                    <img class="" src="media/images/outros/home.jpg" alt="Imagem da página inicial que mostra um computador." width="300px">
                </div>
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
            function handlePressEnter() {
                if (event.keyCode === 13) {
                    document.getElementById("enter").onclick();
                }
            }
        </script>
    </body>
</html>
