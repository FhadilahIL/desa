</div>

<div class="footer mt-3 bg-dark text-light pb-3 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="logo mb-3">
                    <img src="<?= base_url('/assets/img/settings/logo.png') ?>" width="130px">
                </div>
                <div class="alamat">
                    <h4>Contact Us</h4>
                    <p><i class="fas fa-envelope"></i> : <a href="mailto:desacikande2020@gmail.com" class="text-light">desacikande2020@gmail.com</a></p>
                    <p><i class="fas fa-phone-alt"></i> : <a href="tel:+6289677889900" class="text-light">+62 896 7788 9900</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <h4>Menu Desa Cikande</h4>
                <ul class="ml-n3">
                    <li><a href="<?= base_url() ?>" class="text-light">Home</a></li>
                    <li><a href="#" class="text-light">Profile Desa</a>
                        <ul>
                            <li><a href="<?= base_url('struktur_organisasi') ?>" class="text-light">Struktur Organisasi</a></li>
                            <li><a href="<?= base_url('visi_misi') ?>" class="text-light">Visi dan Misi</a></li>
                            <li><a href="<?= base_url('lokasi') ?>" class="text-light">Letak Geografis</a></li>
                            <li><a href="<?= base_url('info_rw_dan_kejaroan') ?>" class="text-light">Info RW dan Kejaroan</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('berita') ?>" class="text-light">Berita</a></li>
                    <li><a href="<?= base_url('dokumen_surat') ?>" class="text-light">Dokumen Surat</a></li>
                    <li><a href="<?= base_url('form_pengaduan') ?>" class="text-light">Form Pengaduan</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-4"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.411328108134!2d106.37827581476911!3d-6.209354095504969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42034f73817739%3A0xa84716a11f75cce6!2sKantor%20Kepala%20Desa%20Cikande!5e0!3m2!1sid!2sid!4v1611201030512!5m2!1sid!2sid" width="100%" height="275" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        </div>
        <hr class="bg-light">
        <div class="row">
            <div class="col text-center">Copyright &copy; <?= date('Y') ?> Desa Cikande</div>
        </div>

    </div>
</div>

<script src="<?= base_url('/assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('/assets/js/popper.js') ?>"></script>
<script src="<?= base_url('/assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('/') ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('/assets/fontawesome/js/all.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

</body>

</html>