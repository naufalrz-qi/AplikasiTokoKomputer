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
                            <h2>{{ $totalKategori }}</h2>
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
                            <h2>{{ $totalBarang }}</h2>
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
                            <h2>{{ $jumlahTransaksiBulanIni }}</h2>
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
                            <h4>Pendapatan Bulan Ini</h4>
                            <h2>Rp {{ number_format($totalPendapatanBulanIni, 0, ',', '.') }}</h2>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-wave fa-2x"></i>
                        </div>
                    </div>
                    <p class="mb-0">Pendapatan bulan ini</p>
                </div>
            </div>
        </div>

        <div class="container">
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
                            @foreach ($recentActivities as $activity)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="{{ $activity['icon'] }}"></i> {{ $activity['message'] }}</span>
                                    <span class="badge {{ $activity['badge'] }}">{{ $activity['time'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scripts for Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data penjualan per bulan dari controller
            const salesData = @json($salesPerMonth);

            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Penjualan',
                        data: salesData,
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
