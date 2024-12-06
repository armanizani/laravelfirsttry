<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Main Page') }}</title>
</head>
<body>
    <header>
        <h1>{{ config('app.name', 'Laravel') }}</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('F j') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
    </footer>
</body>
</html>
