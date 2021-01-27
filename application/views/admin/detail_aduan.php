<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_pengaduan') ?>">Data Pengaduan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Pengaduan</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $id_pengaduan ?></li>
        </ol>
    </div>
    <!-- Isi -->
    <div class="row">
        <!-- Tabel Admin -->
        <div class="col-lg">
            <div class="card mb-4">
                <div class="p-3">
                    <div class="row">
                        <div class="col-lg col-sm">
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Nama Pengadu</div>
                                <div class="col-lg-8 col-sm-8"><b><?= $data_pengaduan->nama_pengadu ?></b></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">NIK Pengadu</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->nik_pengadu ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Email Pengadu</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->email_pengadu ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">RT Pengadu</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->rt_pengadu ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Waktu Pengaduan</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->waktu_pengaduan ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Status Pengaduan</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->status ? "Sudah Dibalas" : "Pending" ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Admin Yang Me-reply</div>
                                <div class="col-lg-8 col-sm-8"><b><?= $data_pengaduan->nama ?></b></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Tanggal Reply</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->reply_time ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Isi Pengaduan</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->isi_pengaduan ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 col-sm-4">Reply</div>
                                <div class="col-lg-8 col-sm-8"><?= $data_pengaduan->pesan ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->