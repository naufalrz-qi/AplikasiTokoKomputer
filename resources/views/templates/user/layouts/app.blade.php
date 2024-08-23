<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MTC Mitra Komputer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Default height for larger screens */
        .carousel-img {
            height: 600px;
        }

        /* Responsive height for smaller screens */
        @media (max-width: 1200px) {
            .carousel-img {
                height: 500px;
            }
        }

        @media (max-width: 992px) {
            .carousel-img {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .carousel-img {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .carousel-img {
                height: 200px;
            }
        }

        /* Ensure images cover the entire area */
        .carousel-img img {
            object-fit: cover;
            height: 100%;
        }
    </style>

</head>

<body>

    @include('templates.user.layouts.navbar')

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active carousel-img">
                <img src="{{ asset('assets/img/pexels-1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="carousel-item carousel-img">
                <img src="{{ asset('assets/img/pexels-2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="carousel-item carousel-img">
                <img src="{{ asset('assets/img/pexels-3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <main>
        @yield('content')
    </main>

    @include('templates.user.layouts.footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
