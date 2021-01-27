<div class="row">
    <?php foreach ($tampil_berita as $data) { ?>
        <div class="col-sm-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= base_url('/assets/img/berita/') . $data->gambar_berita ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= substr(ucwords(str_replace('-', ' ', $data->judul_berita)), 0, 35) ?>...</h5>
                    <p class="card-text"><?= substr($data->isi_berita, 0, 50) ?>...</p>
                    <a href="<?= base_url('tampil_berita/') . $data->judul_berita ?>" class="btn btn-primary">Lihat Berita</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<nav aria-label="Page navigation example">
    <?= $this->pagination->create_links() ?>
</nav>