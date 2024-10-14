<x-app-layout-app>
    <style>
        /* Default height for larger screens */
        .carousel-img {
            height: 300px;
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



    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
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

    <main id="about">
        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Mitra Computer<br>Pilihan Terbaik untuk Solusi Komputer Anda</h2>
                <p class="lead text-center">Mitra Computer adalah toko komputer terkemuka yang menyediakan berbagai
                    kebutuhan teknologi dengan kualitas terbaik dan harga terjangkau.</p>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <h3>Produk Unggulan</h3>
                        <p>Kami menawarkan berbagai produk komputer mulai dari laptop, desktop, komponen PC, hingga
                            aksesoris terbaru. Semua produk kami dipilih dengan cermat untuk memastikan kualitas dan
                            performa terbaik bagi pelanggan.</p>
                        <ul>
                            <li>LENOVO V14 G3 IAP I3-1215U/8GB/512/14 FHD/DOS</li>
                            <li>LENOVO IP3 14IAUT 13-1215U/8GB/256/WIN11 HOME OHS 2021</li>
                            <li>NB ASUS E1404GA-FHD326 I3-N305/8GB/256/WIN11+OHS/14 FHD/SLV</li>
                            <li>LENOVO V14-G3-IAP I3-1215U/4GB/512/DOS/14 FHD</li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-md-center">
                        <img src="{{ asset('assets/img/asus.jpg') }}" class="img-fluid rounded shadow"
                            alt="Mitra Computer">
                    </div>

                </div>
                <div class="text-center mt-3">
                    <a href="/about" class="btn text-white px-5"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc);">Selengkapnya</a>
                </div>
            </div>
        </section>

        <section class="bg-light py-5">
            <div class="container">
                <h3 class="text-center mb-4">Layanan Profesional</h3>
                <p class="lead text-center">Mitra Computer tidak hanya menyediakan produk berkualitas, tetapi juga
                    layanan profesional yang membantu Anda merawat dan mengoptimalkan perangkat teknologi Anda.</p>
                <div class="row mt-5">
                    <div class="col-md-4 text-center">
                        <i class="fas fa-cogs fa-3x text-primary mb-3"></i>
                        <h4>Perbaikan dan Pemeliharaan</h4>
                        <p>Kami menyediakan layanan perbaikan dan pemeliharaan untuk semua jenis perangkat komputer,
                            memastikan perangkat Anda selalu dalam kondisi prima.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-user-shield fa-3x text-primary mb-3"></i>
                        <h4>Keamanan Data</h4>
                        <p>Dengan layanan keamanan data kami, Anda dapat melindungi informasi penting dari ancaman
                            siber. Keamanan data pelanggan adalah prioritas utama kami.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                        <h4>Dukungan Pelanggan</h4>
                        <p>Tim dukungan pelanggan kami siap membantu Anda dengan segala pertanyaan dan kebutuhan
                            teknologi Anda. Layanan pelanggan yang ramah dan responsif adalah komitmen kami.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <h3 class="text-center mb-4">Temukan Produk Terbaik Hanya di MTC Mitra Computer</h3>
                <p class="text-center">MTC Mitra Computer selalu menghadirkan produk-produk teknologi terbaik yang
                    sesuai dengan kebutuhan Anda. Kami menawarkan berbagai pilihan laptop, desktop, dan aksesoris
                    komputer dari merek-merek ternama dengan kualitas yang terjamin. Setiap produk dipilih dengan cermat
                    untuk memberikan performa maksimal dan daya tahan yang luar biasa.</p>
                <p class="text-center">Baik Anda seorang profesional yang membutuhkan perangkat untuk kerja, seorang
                    gamer yang mencari PC dengan performa tinggi, atau seorang pelajar yang memerlukan laptop untuk
                    belajar, kami memiliki produk yang tepat untuk Anda. Selain itu, tim kami siap memberikan
                    rekomendasi terbaik sesuai kebutuhan dan anggaran Anda.</p>
                <p class="text-center">Jangan lewatkan kesempatan untuk mendapatkan produk dengan kualitas terbaik dan
                    harga kompetitif hanya di MTC Mitra Computer. Kami juga menyediakan berbagai penawaran khusus dan
                    diskon untuk pelanggan setia.</p>
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc);">Belanja Sekarang</a>
                </div>
            </div>
        </section>
    </main>

    <div class="container my-5" id="contact">
        <div class="card shadow-lg mx-auto col-md-6">
            <div>
                <div
                    style="background-image: url('{{ asset('assets/img/back-again.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: -50%;">
                    <div
                        style="background-image: url('{{ asset('assets/img/back-again-2.png') }}'); background-size: 38%; background-repeat: no-repeat; background-position: 150%;">
                        <div class="card-body p-5">
                            <h2 class="card-title text-center mb-4">Contact Us</h2>
                            <form action="mailto:dudyhartanto@gmail.com" method="post" enctype="text/plain">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek:</label>
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan:</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn text-white px-5"
                                        style="background: linear-gradient(135deg, #6a11cb, #2575fc);">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout-app>
