<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MTC Mitra Komputer</title>
</head>
<body>
    @include('templates.user.layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('templates.user.layouts.footer')
</body>
</html>
