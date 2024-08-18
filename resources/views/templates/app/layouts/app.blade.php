<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('templates.app.layouts.navbar')

    <main>
        @yield('content')
        {{ $slot }}
    </main>

    {{-- <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('assets/img/pexels-3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ellipsesinc - Kaos Oversize Pria Wanita Polos</h5>
                        <p class="card-text text-success">Rp43.900</p>
                        <p class="card-text"><span class="badge bg-success">Diskon 6%</span></p>
                        <p class="text-muted">Jakarta Barat</p>
                        <p class="text-muted">⭐ 4.4 | 80+ terjual</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('assets/img/pexels-3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ellipsesinc - Kaos Oversize Pria Wanita NY</h5>
                        <p class="card-text text-success">Rp43.900</p>
                        <p class="card-text"><span class="badge bg-success">Diskon 6%</span></p>
                        <p class="text-muted">Jakarta Barat</p>
                        <p class="text-muted">⭐ 4.7 | 50+ terjual</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('assets/img/pexels-3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Kaos Import Lengan Pendek</h5>
                        <p class="card-text text-success">Rp35.000 <span
                                class="text-muted text-decoration-line-through">Rp95.000</span></p>
                        <p class="card-text"><span class="badge bg-success">Diskon 63%</span></p>
                        <p class="text-muted">Jakarta Barat</p>
                        <p class="text-muted">⭐ 4.1 | 30+ terjual</p>
                    </div>
                </div>
            </div>

            <!-- Add more cards as needed -->
        </div>
    </div> --}}

    @include('templates.app.layouts.footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
