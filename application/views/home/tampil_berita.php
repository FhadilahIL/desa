<div class="">
    <img src="<?= base_url('/assets/img/berita/') . $tampil_berita->gambar_berita ?>" class="w-100">
</div>
<div class="posted">
    <p>Dipublikasi Oleh : <?= $tampil_berita->nama ?> Tanggal Publikasi : <?= $tampil_berita->news_created ?></p>
</div>
<div class="isi_berita text-justify">
    <p><?= $tampil_berita->isi_berita ?></p>
</div>