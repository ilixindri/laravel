<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head-layout>
        <x-slot name="title">
            {{ config('app.name', 'Laravel') }}
        </x-slot>
        <!-- <x-slot name="modules">
            {{ __('Profile') }}
        </x-slot>
        <x-slot name="components">
            {{ __('Profile') }}
        </x-slot> -->
    </x-head-layout>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
