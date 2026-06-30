<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CanchaYa - Reservá tu cancha</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gradient-to-br from-primary-50 via-white to-primary-100 dark:from-primary-950 dark:via-gray-900 dark:to-gray-950 min-h-screen">
            <div class="relative min-h-screen flex flex-col items-center justify-center">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="flex items-center justify-between py-10">
                        <x-application-logo class="h-12 w-auto text-primary-600 dark:text-primary-400" />

                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>

                    <main class="mt-16 text-center">
                        <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white sm:text-6xl">
                            <span class="text-primary-600 dark:text-primary-400">Cancha</span>Ya
                        </h1>
                        <p class="mt-6 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                            Reservá tu cancha de forma rápida y sencilla. Encontrá las mejores canchas de tu zona y disfrutá del deporte.
                        </p>

                        <div class="mt-10 flex items-center justify-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Ir al Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Iniciar Sesión
                                </a>
                                <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border-2 border-primary-600 dark:border-primary-400 rounded-lg font-semibold text-sm text-primary-600 dark:text-primary-400 uppercase tracking-widest hover:bg-primary-50 dark:hover:bg-primary-950 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Registrarse
                                </a>
                            @endauth
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-gray-500 dark:text-gray-500">
                        &copy; {{ date('Y') }} CanchaYa. Todos los derechos reservados.
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
