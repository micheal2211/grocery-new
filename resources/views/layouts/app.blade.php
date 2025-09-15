<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
       <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')   {{-- Allow page-specific styles --}}
</head>

</head>
<body>

    <header>
        <h1>My Store</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Store</p>
    </footer>

</body>
</html>
