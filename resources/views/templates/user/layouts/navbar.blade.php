<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.home') }}">MTC.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('user.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('user.kategori.index') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('keranjang.index') }}">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pembelian.user.index') }}">Riwayat Pembelian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile.index') }}">Profile Setting</a>
                    </li>
                    <li class="nav-item">
                        @livewire('logout-button')
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style>
    /* Custom styles */
    header nav {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        /* Gradient background for the navbar */
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
        color: #fff !important;
    }

    .navbar-nav .nav-link {
        font-size: 1rem;
        color: #fff !important;
        margin-right: 1rem;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #d1e8ff !important;
        /* Lighter color on hover */
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .navbar-nav {
            text-align: center;
        }

        .navbar-nav .nav-item {
            margin-bottom: 1rem;
        }
    }
</style>
