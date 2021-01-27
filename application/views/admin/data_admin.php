<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
        </ol>
    </div>
    <!-- Isi -->
    <a class="btn btn-primary mb-3" href="javascript:void(0);" data-toggle="modal" data-target="#tambahAdminModal">
        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
        Tambah Data Admin
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
                            <th style="min-width: 350px;">Email</th>
                            <th style="min-width: 300px;">Nama</th>
                            <th style="min-width: 80px;">Status</th>
                            <th style="min-width: 150px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($tampil_admin as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $data->email ?></td>
                                    <td><?= $data->nama ?></td>
                                    <?php if ($data->status == 1) { ?>
                                        <td class="bg-success text-light">Aktif</td>
                                    <?php } else { ?>
                                        <td class="bg-danger text-light">Tidak Aktif</td>
                                    <?php } ?>
                                    <td>
                                        <a href="<?= base_url('admin/detail_admin/') . md5($data->id_admin) ?>" class="btn btn-info"><i class="fas fa-info fa-fw"></i></a>
                                        <?php if ($this->session->id == $data->id_admin) { ?>
                                            <a href="<?= base_url('admin/ubah_admin/') . md5($data->id_admin) ?>" class="btn btn-warning"><i class="fas fa-edit fa-fw"></i></a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('admin/ubah_admin/') . md5($data->id_admin) ?>" class="btn btn-warning"><i class="fas fa-edit fa-fw"></i></a>
                                            <a href="<?= base_url('admin/reset_password/') . md5($data->id_admin) ?>" class="btn btn-success"><i class="fas fa-key fa-fw"></i></a>
                                        <?php } ?>
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
        <div class="modal fade" id="tambahAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Data Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/tambah_admin') ?>" method="post">
                            <div class="form-group">
                                <label>Email (Email Aktif)</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap (Sesuai KTP)</label>
                                <input type="text" class="form-control" name="nama" required>
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