<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <!-- Isi -->
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Admin Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $admin_aktif ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Banyak Berita Tahun <?= date('Y') ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $berita_pertahun ?> Berita</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl col-lg">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Jumlah Pengaduan Bulanan Tahun <?= date('Y') ?></h5>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->