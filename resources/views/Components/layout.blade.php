<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <nav class="bg-black text-white p-2">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/about" class="p-4">About</x-nav-link>
            <x-nav-link href="/contact" class="p-4">Contact</x-nav-link>
        </nav>
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

            {{ $slot }}

        </div>
    </body>
</html>
