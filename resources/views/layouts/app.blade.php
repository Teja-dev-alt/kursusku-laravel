<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', $siteName ?? 'KursusKu UIN')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @yield('scripts')

</body>
</html>