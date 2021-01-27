<?php if (!$this->session->logged) {
    $this->session->set_flashdata('gagal', 'Melakukan pengajuan pengaduan harus login terlebih dahulu.');
    redirect('login');
} ?>
<?php if ($this->session->flashdata('berhasil')) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('berhasil'); ?>
    </div>
<?php } else if ($this->session->flashdata('gagal')) { ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('gagal'); ?>
    </div>
<?php } else if ($this->session->flashdata('info')) { ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->flashdata('info'); ?> <a href="<?= base_url('profile') ?>">Klik Disini</a>
    </div>
<?php } ?>
<form action="<?= base_url('pengaduan/tambah_pengaduan') ?>" method="post">
    <div class="form-group">
        <label>Nama Pengadu</label>
        <input type="text" readonly name="nama_pengadu" class="form-control" value="<?= $warga->nama_warga ?>" required>
    </div>
    <div class="form-group">
        <label>NIK Pengadu</label>
        <input type="text" readonly value="<?= $warga->nik ?>" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="nik_pengadu" class="form-control" required>
    </div>
    <div class="form-group">
        <label>RT Pengadu</label>
        <input type="text" readonly value="<?= $warga->rt ?>" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="rt_pengadu" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email Pengadu</label>
        <input type="email" readonly value="<?= $warga->email_warga ?>" name="email_pengadu" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Jenis Pengaduan</label>
        <select name="jenis_pengaduan" id="jenis_pengaduan" onchange="jenisPengaduan()" class="form-control">
            <option value="">-- Pilih Jenis Pengaduan --</option>
            <option value="Jalan Desa">Jalan Desa</option>
            <option value="Irigasi">Irigasi</option>
            <option value="Pertanian">Pertanian</option>
            <option value="Budaya">Budaya</option>
            <option value="Jembatan">Jembatan</option>
            <option value="Posyandu">Posyandu</option>
            <option value="UKM">UKM</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
    <div class="form-group">
        <label>Isi Pengaduan</label>
        <textarea name="isi_pengaduan" rows="5" class="form-control" required></textarea>
    </div>
    <?php if ($warga->email_warga == '') { ?>
        <button type="submit" disabled class="btn btn-success btn-block">Ajukan Pengaduan</button>
    <?php } else { ?>
        <button type="submit" class="btn btn-success btn-block">Ajukan Pengaduan</button>
    <?php } ?>
</form>