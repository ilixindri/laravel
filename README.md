<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Laravel System
Sistema que cria sistemas de CRUD com add-ons.

# My License
Royal. Verifique no meu GitHub.

# Regras de negócio

 - Na tela inicial enter vai direto para o dashboard.

# Start

```
php artisan serve
# AND
npm run build
npm run dev
```

# Componentes

Atributos passados por :attr e não recuperados pelo @props são inseridos automaticamente.
Os recuperados pelo @props não e hoje (08/07/2024) não é necessário recuperar pelo props para usar.

```html
<x-responsive-nav-link :href="route('DashBoard')" :active="request()->routeIs('DashBoard')">
    {{ __('DashBoard') }}
</x-responsive-nav-link>
```

```php
@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 dark:border-indigo-600 text-start text-base font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes }}>
    {{ $slot }}
</a>
```

# erro 404
`sudo a2enmod rewrite`

# ERRO de css
abrir network no dev tools do browser

# erro 1
```
The "https://repo.packagist.org/p2/symfony/error-handler.json" file could not be downloaded: SSL: Handshake timed out
  Failed to enable crypto
  failed to open stream: operation failed
```
```bash
composer config --global disable-tls true
composer config --global secure-http false
```
Adicionar "secure-http": falso no arquivo composer.json
```json
"config": {
    "secure-http": false
},
```
```bash
composer clear-cache
composer diagnose
```
# erro 2
`sudo chmod -R 777 /var/www/html/development/storage`
# erro 3
`sudo chmod -R 777 /var/www/html/development/bootstrap/cache`
# erro 4
comment DB_DATABASE in .env.
https://stackoverflow.com/questions/30382554/sqlite-unable-to-open-database-file-laravel-windows
# erro 5
install dbal version 2 `composer require doctrine/dbal:2.13`. 
https://stackoverflow.com/questions/33002659/laravel-5-1-class-doctrine-dbal-driver-pdosqlite-driver-not-found
# erro 6
enble mod rewrite `sudo a2enmod rewrite` and put `AllowOverride All` nas configs apache na pasta do sistema web. 
https://stackoverflow.com/questions/36303706/url-was-not-found-on-this-server-laravel
# debug
`dd($clientes);`
# ...
```php
protected static function booted()
{
    static::retrieved(function ($model) {
        $model->what(); //called once all attributes are loaded
    });
}
```
# link doc expanded
https://laravel.com/api/8.x/index.html
# update line dates without update any field
`$user->touch();`
# Start
```bash
# Use o Prompt De Comando OR Terminal
# php composer update
php composer install
# php artisan vendor:publish --tag=sanctum-migrations # precisou na migração de laravel 10 para 11.
# touch database/database.sqlite # Terminal
# OR
# type nul > database/database.sqlite # Prompt De Comando
php artisan migrate:refresh --seed
npm install
php artisan key:generate
npm run watch
# EM OUTRA TAB
php compose serve --port=80
# Ctrl+K Ctrl+D to DevDb Open/Close
```

# Codes
```bash
php artisan cache:clear && php artisan config:clear && php artisan view:clear && php artisan route:clear
php artisan make:model Sistema -a
php artisan make:controller ProvisionServer --invokable # ações complexas
```

# Deploy
```bash
composer install --no-dev --optimize-autoloader
php artisan migrate:refresh --seed
npm install
php artisan key:generate
php artisan clear-compiled && composer dump-autoload && php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

# Develop
 - Install Docker Engine to Qodana
 - Install Qodana (JetBrains)

```php
Route::resource('photos', PhotoController::class);
Route::resources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
Route::resource('photos', PhotoController::class)
        ->missing(function (Request $request) {
            return Redirect::route('photos.index');
        }); # Personalizando o comportamento do modelo ausente
# Soft Deleted Models # Exibir soft delets
Route::resource('photos', PhotoController::class)->withTrashed(['show']);
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
Route::apiResource('photos', PhotoController::class); # sem create e edit
# /photos/{photo}/comments/{comment}
Route::resource('photos.comments', PhotoCommentController::class);
# usar field slug ao invés de id para recuperar o model
Route::resource('photos.comments', PhotoCommentController::class)->scoped([
    'comment' => 'slug',
]);
# só precisa da Photo para index, create, store
# Para show, edit, update e destroy apenas precisa de Comment
Route::resource('photos.comments', CommentController::class)->shallow();
Route::resource('photos', PhotoController::class)->names([
    'create' => 'photos.build'
])
# rename model with name diff caso queira
# /users/{admin_user}
Route::resource('users', AdminUserController::class)->parameters([
    'users' => 'admin_user'
]);
# cada user ter um único perfil
# tera profile.show, profile.edit e profile.update
Route::singleton('profile', ProfileController::class);
# tera photos.thumbnail.show, photos.thumbnail.edit e photos.thumbnail.update
Route::singleton('photos.thumbnail', ThumbnailController::class);
# tera todos
Route::singleton('photos.thumbnail', ThumbnailController::class)->creatable();
```

# outputs command line
> @php artisan package:discover --ansi

   INFO  Discovering packages.

  laravel/breeze ................................................................................................ DONE
  laravel/sail .................................................................................................. DONE
  laravel/sanctum ............................................................................................... DONE
  laravel/tinker ................................................................................................ DONE
  nesbot/carbon ................................................................................................. DONE
  nunomaduro/collision .......................................................................................... DONE
  nunomaduro/termwind ........................................................................................... DONE
  spatie/laravel-ignition ....................................................................................... DONE

# Escolha do nome Enter
 - SignIn não foi aceito pois existe SignUp e ambos referem-se a acessar o sistema.
 - Login não foi aceito pois existe Logon e ambos referem-se a acessar o sistema. 

# idea history
eu ia usar o loading em todas as paginas enquanto eu fazia a requisição com js para pegar a pagina e substituir o body.

mas agora vou usar a lib Pace.js e se der problema vou criar minha propria implementação com event load para ser a primeira coisa que carrega no load. lembrando que a velocidade no estilo Page.js de minha propria implementação é mais rápida que a primeira ideia de loading descrita nessa seção.

# storage definition
```bash
nome-do-projeto/
├── css/
│   ├── style.css        (Estilos principais)
│   ├── components/      (Estilos de componentes específicos)
│   │   ├── button.css
│   │   ├── form.css
│   │   └── ...
│   ├── vendors/         (Bibliotecas CSS externas, ex: Bootstrap, Normalize)
│   │   ├── bootstrap.min.css
│   │   └── ...
│   └── utils/           (Estilos utilitários, ex: resets, helpers)
│       ├── reset.css
│       └── helpers.css
├── js/
│   ├── script.js       (JavaScript principal)
│   ├── modules/        (Módulos JavaScript)
│   │   ├── carousel.js
│   │   ├── validation.js
│   │   └── ...
│   ├── vendors/        (Bibliotecas JS externas, ex: jQuery, React)
│   │   ├── jquery.min.js
│   │   └── ...
│   └── utils/          (Funções utilitárias)
│       ├── api.js
│       └── functions.js
├── media/
│   ├── images/
│   │   ├── logos/
│   │   │   ├── logo.png
│   │   │   └── ...
│   │   ├── icons/
│   │   │   ├── search.svg
│   │   │   └── ...
│   │   ├── backgrounds/
│   │   │   └── ...
│   │   └── outros/
│   ├── videos/
│   │   └── ...
│   ├── audios/
│   │   └── ...
│   └── fonts/
│       └── ...
├── index.html          (Página HTML principal)
└── outros-arquivos.html (Outras páginas HTML, se houver)
```