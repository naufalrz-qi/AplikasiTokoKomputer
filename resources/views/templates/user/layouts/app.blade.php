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
            height: 400px;
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

        #myButton {
            width: 48px;
            height: 48px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            /* Awalnya disembunyikan */
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            font-size: 18px;
        }

        #myButton:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <button id="myButton" class="floating-button"><i class="fas fa-arrow-up"></i></button>


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
                <img src="{{ asset('assets/img/pc-1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="carousel-item carousel-img">
                <img src="{{ asset('assets/img/pc-2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="carousel-item carousel-img">
                <img src="{{ asset('assets/img/pc-3.jpg') }}" class="d-block w-100" alt="...">
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            // Saat scroll lebih dari 100px dari atas, tombol akan muncul
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#myButton').fadeIn();
                } else {
                    $('#myButton').fadeOut();
                }
            });

            // Ketika tombol diklik, halaman akan scroll ke atas secara smooth
            $('#myButton').click(function() {
                $('html, body').animate({
                        scrollTop: 0
                    }

                    , 50);
                return false;
            });
        });
    </script>
</body>

</html>
