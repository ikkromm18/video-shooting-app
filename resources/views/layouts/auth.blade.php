<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') </title>
    @vite('resources/css/app.css')
</head>

<body>


    <div class="flex justify-center items-center p-10 min-h-screen w-full bg-gray-100">
        @yield('content')
    </div>




    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
