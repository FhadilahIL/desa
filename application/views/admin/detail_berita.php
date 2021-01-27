<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= ucwords(str_replace('-', ' ', $data_berita->judul_berita)) ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_berita') ?>">Data Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
        </ol>
    </div>
    <!-- Isi -->
    <div class="row">
        <div class="col">
            <div class="col-lg">
                <div class="card mb-4">
                    <div class="p-3">
                        <div class="mb-3">
                            <img src="<?= base_url('/assets/img/berita/') . $data_berita->gambar_berita ?>" alt="Gambar Berita <?= ucwords(str_replace('-', ' ', $data_berita->judul_berita)) ?>" class="w-100">
                        </div>
                        <div class="mb-3">
                            Posted By <b><?= $data_berita->nama ?></b> || Published on <b><?= date('d F Y H:i:s', strtotime($data_berita->news_created)) ?></b>
                        </div>
                        <div class="text-justify">
                            <?= $data_berita->isi_berita ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of isi -->