<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Berita</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_berita') ?>">Data Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Berita</li>
        </ol>
    </div>
    <!-- Isi -->
    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="p-3">
                    <form action="<?= base_url('berita/edit_berita/') . md5($data_berita->id_berita) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" class="form-control" name="judul_berita" value="<?= ucwords(str_replace('-', ' ', $data_berita->judul_berita)) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea name="isi_berita" rows="10" class="form-control" required><?= $data_berita->isi_berita ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar Berita</label>
                            <div class="mb-3">
                                <img src="<?= base_url('/') ?>assets/img/berita/<?= $data_berita->gambar_berita ?>" class="w-100" alt="Gambar Berita">
                            </div>
                            <input type="file" accept=".jpeg, .png, .jpg" class="form-control-file" name="gambar_berita">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Ubah Data Berita</button>
                    </form>
                </div>
            </div>
        </div>
        <!--Row-->