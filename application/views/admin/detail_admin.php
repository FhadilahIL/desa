<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Admin <?= $nama ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_admin') ?>">Data Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Admin</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $nama ?></li>
        </ol>
    </div>
    <!-- Isi -->
    <div class="row">
        <!-- Tabel Admin -->
        <div class="col-lg">
            <div class="card mb-4">
                <div class="p-3">
                    <div class="row">
                        <div class="col-lg-4 col-lg">
                            <img src="<?= base_url('/') ?>assets/img/profile/<?= $data_admin->foto ?>" alt="Gambar Profile">
                        </div>
                        <div class="col-lg-7 col-lg">
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Nama</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_admin->nama ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Email</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_admin->email ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Date Created</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_admin->date_created ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->