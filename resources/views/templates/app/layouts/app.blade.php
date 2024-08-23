<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MTC.</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('templates.app.layouts.navbar')

    <main>
        @if (isset($slot) && trim($slot) !== '')
            <!-- Jika slot ada dan tidak kosong, tampilkan konten dari slot -->
            {{ $slot }}
        @elseif(View::hasSection('content'))
            <!-- Jika slot tidak ada, cek apakah section 'content' ada -->
            @yield('content')
        @else
            <!-- Jika tidak ada slot dan tidak ada section 'content', tampilkan konten default -->
            <p>Konten default atau pesan error di sini.</p>
        @endif
    </main>

    @include('templates.app.layouts.footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
