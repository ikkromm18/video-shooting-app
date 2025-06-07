<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') </title>
    @vite('resources/css/app.css')

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>


    <x-navbar />

    @yield('content')

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
