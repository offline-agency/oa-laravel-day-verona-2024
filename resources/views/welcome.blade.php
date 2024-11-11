<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reverb vs. Pusher</title>
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/3/3d/LaravelLogo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-white/50 dark:bg-black dark:text-white/50">
    <div class="d-flex justify-content-center">
        <header class="items-center gap-2 py-10 lg:grid-cols-3">
            <nav class="flex flex-1 justify-between">
                <a
                    href="{{ url('/dashboard-reverb') }}"
                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Dashboard Reverb
                </a>
                <a
                    href="{{ url('/dashboard-pusher') }}"
                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Dashboard Pusher
                </a>
            </nav>
        </header>
    </div>
    <div class="text-white text-center"
         style="top: 50%; left: 50%; position: absolute;transform: translate(-50%, -50%);">
        <h1 class="fw-bold display-1">Real-Time Laravel Showdown</h1>
        <h2 class="display-3">Laravel Reverb vs. Pusher </h2>
    </div>
</div>
</body>
</html>
