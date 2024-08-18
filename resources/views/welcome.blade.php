<x-app-layout-app>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active carousel-img">
                <img src="{{ asset('assets/img/pexels-1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Slide 1</h5>
                    <p>Deskripsi untuk slide 1.</p>
                </div>
            </div>
            <div class="carousel-item carousel-img">
                <img src="{{ asset('assets/img/pexels-2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Slide 2</h5>
                    <p>Deskripsi untuk slide 2.</p>
                </div>
            </div>
            <div class="carousel-item carousel-img">
                <img src="{{ asset('assets/img/pexels-3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Slide 3</h5>
                    <p>Deskripsi untuk slide 3.</p>
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
</x-app-layout-app>
