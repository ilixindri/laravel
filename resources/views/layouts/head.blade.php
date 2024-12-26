    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if (isset($title))
            <title>{{ $title }}</title>
        @endif

        <link rel="stylesheet" href="/css/style.css">
		<script src="/js/script.js" defer></script>

        <script src="/js/modules{{ str_replace(url('/'), '', url()->current()) }}.js" defer></script>

        <link rel="stylesheet" href="/css/components{{ str_replace(url('/'), '', url()->current()) }}.css">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>