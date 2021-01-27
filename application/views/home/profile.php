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
        <?= $this->session->flashdata('info'); ?>
    </div>
<?php } ?>
<form action="<?= base_url('warga/update_profile_warga') ?>" method="post">
    <div class="form-group">
        <label>Nama Pengadu</label>
        <input type="text" name="nama" class="form-control" value="<?= $warga->nama_warga ?>" required>
    </div>
    <div class="form-group">
        <label>NIK Pengadu</label>
        <input type="text" value="<?= $warga->nik ?>" readonly oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="nik" class="form-control" required>
    </div>
    <div class="form-group">
        <label>RT Pengadu</label>
        <input type="text" value="<?= $warga->rt ?>" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="rt" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email Pengadu</label>
        <input type="email" value="<?= $warga->email_warga ?>" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" rows="5" class="form-control" required><?= $warga->alamat ?></textarea>
    </div>
    <button type="submit" class="btn btn-success btn-block">Simpan Data Profile</button>
</form>