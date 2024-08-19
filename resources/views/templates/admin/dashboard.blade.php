@extends($template)

@section('content')
    <div class="container-fluid">
        <!-- Dashboard Heading -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 text-center">Dashboard Admin</h1>
            </div>
        </div>

        <!-- Stats Cards Row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card p-4 bg-primary text-white rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Total Kategori</h4>
                            <h2>150</h2>
                        </div>
                        <div>
                            <i class="fas fa-tags fa-2x"></i>
                        </div>
                    </div>
                    <p class="mb-0">Kategori terdaftar</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card p-4 bg-success text-white rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Total Barang</h4>
                            <h2>450</h2>
                        </div>
                        <div>
                            <i class="fas fa-box-open fa-2x"></i>
                        </div>
                    </div>
                    <p class="mb-0">Barang yang tersedia</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card p-4 bg-warning text-white rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Transaksi Bulan Ini</h4>
                            <h2>320</h2>
                        </div>
                        <div>
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                    <p class="mb-0">Jumlah transaksi</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card p-4 bg-danger text-white rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Pendapatan</h4>
                            <h2>Rp 50 Jt</h2>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave fa-2x"></i>
                        </div>
                    </div>
                    <p class="mb-0">Pendapatan bulan ini</p>
                </div>
            </div>
        </div>

        <!-- Charts and Recent Activity -->
        <div class="row mt-4">
            <!-- Chart Column -->
            <div class="col-lg-8 col-md-12">
                <div class="chart-card bg-white p-4 rounded shadow-sm">
                    <h5 class="mb-4">Statistik Penjualan</h5>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Recent Activity Column -->
            <div class="col-lg-4 col-md-12">
                <div class="recent-activity bg-white p-4 rounded shadow-sm">
                    <h5 class="mb-4">Aktivitas Terbaru</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-box"></i> Barang baru ditambahkan</span>
                            <span class="badge bg-success">2 jam yang lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-shopping-cart"></i> Pembelian berhasil</span>
                            <span class="badge bg-info">1 hari yang lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user-plus"></i> Pengguna baru terdaftar</span>
                            <span class="badge bg-warning">3 hari yang lalu</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts for Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Penjualan',
                    data: [120, 190, 300, 500, 200, 300, 450, 700, 400, 600, 800, 900],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
