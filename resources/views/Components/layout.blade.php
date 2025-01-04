<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
</head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <nav>
            <a href="/" class="p-4">Home</a>
            <a href="/about" class="p-4">About</a>
            <a href="/contact" class="p-4">Contact</a>
        </nav>
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

            {{ $slot }}

        </div>
    </body>
</html>
