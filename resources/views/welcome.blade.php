<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('head')
    <body class="antialiased" onkeydown="handlePressEnter()">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
		<style>
			.test1 {
				text-align: right;
				display: inline-block;
			}
			.test2 {
				text-align: right;
				display: inline;				
			}
			.test3 {
				display: inline-block;
				justify-content: end;
			}
			.test4 {
				display: inline;
				justify-content: end;				
			}
			.test5 {
				display: flex;
				margin: 0 auto;
			}
			.test6 {
				justify-content: end;
			}
			.test7 {
				
			}
			.h:hover, .h:focus {
				background-color: #52575D;
				color: #fff !important;
			}
			.hc:hover, .hc:focus {
				color: #fff !important;
			}
			#custom-menu {
				display: none;
				position: absolute;
				background-color: #343a40;
				color: #dee2e6;
				border: 1px solid #ccc;
				box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
			}
			#custom-menu ul {
				list-style: none;
				margin: 0;
				padding: 0;
			}
			#custom-menu li {
				padding: 8px 16px;
				cursor: pointer;
			}
			#custom-menu li:focus, #custom-menu li:hover {
				background-color: #52575D;
			}
		</style>
			<div style="text-align: end;" class="m-2">
			<div class="" style="display: inline-flex; background-color: #ecf0f1;">
				<div class="" id="auth" style="cursor: pointer">
					@auth
						<a href="{{ url('/dashboard') }}" class="text-decoration-none text-reset text-primary-emphasis hc">{{ __('Dashboard') }}</a>
					@else
						<!--<a href="/signin" class="text-decoration-none text-reset text-primary-emphasis hc">Sign In</a>-->
						<button id="enter" class="p-3 border-0 h" onclick="window.location.href = '{{ route('x4', ['NextRoute' => 'Mail']) }}'" type="button" aria-expanded="false">
							{{ __('Enter') }}
						</button>
					@endauth
<button class="p-3 border-0 h" onclick="window.location.href = '/load0/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load02/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load1/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load12/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load2/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load22/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load3/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load32/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load4/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load42/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load5/1'" type="button">{{ __('Test') }}</button>
<button class="p-3 border-0 h" onclick="window.location.href = '/load52/1'" type="button">{{ __('Test') }}</button>
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
			</div>
			<div style="text-align: center;" class="max-w-7xl mx-auto p-6 lg:p-8">
				<h1>{{ __('System Creator') }}</h1>
                <div class="flex justify-center">
					<img src="images/home.jpg" alt="Imagem da página inicial que mostra um computador." width="30%">
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
					performAction();
				}
			}
			function performAction() {
				document.getElementById("enter").onclick()
			}
		</script>
    </body>
</html>
