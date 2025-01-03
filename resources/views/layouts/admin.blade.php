<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2025 Admin Panel</p>
    </footer>
</body>
</html>
