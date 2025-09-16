<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Clinic Management System')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex flex-col">
        @include('partials.navbar')

        <div class="flex flex-1">
            @include('partials.sidebar')
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>

        @include('partials.footer')
    </div>

</body>
</html>
