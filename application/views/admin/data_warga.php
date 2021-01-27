<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Warga</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
        </ol>
    </div>
    <!-- Isi -->
    <a class="btn btn-primary mb-3" href="javascript:void(0);" data-toggle="modal" data-target="#tambahWargaModal">
        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
        Tambah Data Warga
    </a>
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
    <?php } ?>
    <div class="row">
        <!-- Tabel Admin -->
        <div class="col-lg">
            <div class="card mb-4">
                <div class="p-3">
                    <table class="table table-responsive table-striped table-bordered" id="dataTable">
                        <thead class="thead-dark">
                            <th style="min-width: 40px;">No.</th>
                            <th style="min-width: 350px;">NIK</th>
                            <th style="min-width: 300px;">Nama</th>
                            <th style="min-width: 300px;">Email</th>
                            <th style="min-width: 50px;">RT</th>
                            <th style="min-width: 300px;">Alamat</th>
                            <th style="min-width: 80px;">Status</th>
                            <th style="min-width: 100px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($tampil_warga as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $data->nik ?></td>
                                    <td><?= $data->nama_warga ?></td>
                                    <td><?= $data->email_warga ?></td>
                                    <td><?= $data->rt ?></td>
                                    <td><?= $data->alamat ?></td>
                                    <?php if ($data->status == 1) { ?>
                                        <td class="bg-success text-light text-center">Aktif</td>
                                    <?php } else { ?>
                                        <td class="bg-danger text-light text-center">Tidak Aktif</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($data->status == 1) { ?>
                                            <a href="<?= base_url('warga/nonaktifkan/') . md5($data->id_warga) ?>" class="btn btn-danger"><i class="fas fa-times fa-fw"></i></a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('warga/aktifkan/') . md5($data->id_warga) ?>" class="btn btn-success"><i class="fas fa-check fa-fw"></i></a>
                                        <?php } ?>
                                        <a href="<?= base_url('warga/reset_password/') . md5($data->id_warga) ?>" class="btn btn-warning"><i class="fas fa-key fa-fw"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Row-->
        <!-- Modal Tambah Admin -->
        <div class="modal fade" id="tambahWargaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Data Warga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/tambah_warga') ?>" method="post">
                            <div class="form-group">
                                <label>NIK (Sesuai KTP)</label>
                                <input type="text" class="form-control" maxlength="16" name="nik" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap (Sesuai KTP)</label>
                                <input type="text" class="form-control" name="nama" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label>RT (Sesuai KTP)</label>
                                <input type="text" class="form-control" name="rt" maxlength="3" required>
                            </div>
                            <div class="form-group">
                                <label>Email (Email Aktif)</label>
                                <input type="email" class="form-control" name="email" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat (Sesuai KTP)</label>
                                <textarea name="alamat" rows="5" class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-success"><i class="fas fa-check"></i> Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>