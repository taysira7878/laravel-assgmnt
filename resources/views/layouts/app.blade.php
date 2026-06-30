<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-rose-50 via-violet-50 to-sky-50 font-sans text-slate-700 antialiased">
    <div class="flex min-h-screen">
        @include('partials.sidebar')

        <div class="flex min-h-screen flex-1 flex-col lg:ml-72">
            <header class="sticky top-0 z-20 border-b border-white/60 bg-white/70 px-4 py-4 backdrop-blur-md sm:px-8">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-violet-500">Welcome back ✨</p>
                        <h1 class="text-2xl font-bold text-slate-800">@yield('heading', 'Dashboard')</h1>
                    </div>
                    @yield('header-actions')
                </div>
            </header>

            <main class="flex-1 p-4 pb-24 sm:p-8 lg:pb-8">
                @include('partials.alerts')
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
