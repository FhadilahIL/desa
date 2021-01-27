<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data <?= $nama ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/data_admin') ?>">Data Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Admin</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $nama ?></li>
        </ol>
    </div>
    <!-- Isi -->
    <div class="row">
        <!-- Tabel Admin -->
        <div class="col-lg">
            <div class="card mb-4">
                <div class="p-3">
                    <form action="<?= base_url('admin/edit_admin/') . md5($data_admin->id_admin) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required readonly value="<?= $data_admin->email ?>">
                        </div>
                        <?php if ($this->session->id != $data_admin->id_admin) { ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" readonly required value="<?= $data_admin->nama ?>">
                            </div>
                            <div class="form-group">
                                <label>Foto Profile</label>
                                <div>
                                    <img src="<?= base_url('/') ?>assets/img/profile/<?= $data_admin->foto ?>" width="210px" height="280px" alt="Gambar Profile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <?php if ($data_admin->status == 1) { ?>
                                    <select name="status" class="form-control">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                <?php } else { ?>
                                    <select name="status" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0" selected>Tidak Aktif</option>
                                    </select>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" required value="<?= $data_admin->nama ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword">
                            </div>
                            <div class="form-group">
                                <label>Foto Profile</label>
                                <div>
                                    <img src="<?= base_url('/') ?>assets/img/profile/<?= $data_admin->foto ?>" width="210px" height="280px" alt="Gambar Profile">
                                </div>
                                <input type="file" name="foto_profile" class="form-contol-file mt-3 w-100" accept=".png, .jpg, .jpeg">
                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-success btn-block">Ubah Data <?= $nama ?></button>
                    </form>
                </div>
            </div>
        </div>
        <!--Row-->