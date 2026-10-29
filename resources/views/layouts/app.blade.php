<!doctype html>

<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

```
<title>@yield('title', 'KursusKu')</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
```

</head>
<body>

```
@include('partials.navbar')

@if (session('success'))
    <div class="container pt-3">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif

<main>
    @yield('content')
</main>

<footer>
    <div class="container text-center py-4">
        <p class="mb-1">KursusKu UIN</p>

        <small>
            &copy; {{ date('Y') }} KursusKu.
            Praktikum Pemrograman Web III.
        </small>
    </div>
</footer>

@stack('scripts')
```

</body>
</html>
