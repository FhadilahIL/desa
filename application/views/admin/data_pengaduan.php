<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengaduan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pengaduan</li>
        </ol>
    </div>
    <!-- Isi -->
    <a class="btn btn-primary mb-3" href="javascript:void(0);" data-toggle="modal" data-target="#tambahPengaduanModal">
        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
        Tambah Data Pengaduan
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
                            <th style="min-width: 350px;">Jenis Pengaduan</th>
                            <th style="min-width: 300px;">Nama Pengadu</th>
                            <th style="min-width: 300px;">NIK Pengadu</th>
                            <th style="min-width: 300px;">Email Pengadu</th>
                            <th style="min-width: 100px;">Status</th>
                            <th style="min-width: 150px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($tampil_pengaduan as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $data->jenis_pengaduan ?></td>
                                    <td><?= $data->nama_pengadu ?></td>
                                    <td><?= $data->nik_pengadu ?></td>
                                    <td><?= $data->email_pengadu ?></td>
                                    <?= $data->status ? '<td class="bg-success text-light">Sudah Dibalas</td>' : '<td class="bg-danger text-light">Pending</td>' ?>
                                    <td>
                                        <a href="<?= base_url('admin/detail_aduan/') . md5($data->id_pengaduan) ?>" class="btn btn-info"><i class="fas fa-info fa-fw"></i></a>
                                        <?php if ($data->status == 0) { ?>
                                            <a class="btn btn-warning" href="javascript:void(0);" data-toggle="modal" data-target="#editPengaduanModal<?= md5($data->id_pengaduan) ?>">
                                                <i class="fas fa-edit fa-fw"></i>
                                            </a>
                                            <a class="btn btn-secondary" href="javascript:void(0);" data-toggle="modal" data-target="#replyPengaduanModal<?= md5($data->id_pengaduan) ?>">
                                                <i class="fas fa-reply fa-fw"></i>
                                            </a>
                                            <!-- <a href="<?= base_url('admin/ubah_aduan/') . md5($data->id_pengaduan) ?>" class="btn btn-warning"><i class="fas fa-edit fa-fw"></i></a> -->
                                            <!-- <a href="<?= base_url('admin/reply_aduan/') . md5($data->id_pengaduan) ?>" class="btn btn-secondary"><i class="fas fa-reply fa-fw"></i></a> -->
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!-- Modal edit pengaduan -->
                                <div class="modal fade" id="editPengaduanModal<?= md5($data->id_pengaduan) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelLogout">Ubah Data Pengaduan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('pengaduan/edit_pengaduan/' . md5($data->id_pengaduan)) ?>" method="post">
                                                    <div class="form-group">
                                                        <label>Nama Pengadu</label>
                                                        <input type="text" name="nama_pengadu" class="form-control" value="<?= $data->nama_pengadu ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NIK Pengadu</label>
                                                        <input type="text" value="<?= $data->nik_pengadu ?>" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="nik_pengadu" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Pengadu</label>
                                                        <input type="email" name="email_pengadu" value="<?= $data->email_pengadu ?>" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Pengaduan</label>
                                                        <input type="text" name="jenis_pengaduan" value="<?= $data->jenis_pengaduan ?>" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Isi Pengaduan</label>
                                                        <textarea name="isi_pengaduan" rows="5" class="form-control" required><?= $data->isi_pengaduan ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>RT Pengadu</label>
                                                        <input type="text" value="<?= $data->rt_pengadu ?>" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="rt_pengadu" maxlength="2" class="form-control" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-outline-success"><i class="fas fa-check"></i> Ubah Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal reply -->
                                <div class="modal fade" id="replyPengaduanModal<?= md5($data->id_pengaduan) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelLogout">Form Balas Pengaduan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('pengaduan/reply_pengaduan/' . $data->id_pengaduan) ?>" method="post">
                                                    <div class="form-group">
                                                        <label>Isi Pesan Balasan Pengaduan</label>
                                                        <textarea name="reply_pengaduan" rows="5" class="form-control" required></textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-outline-success"><i class="fas fa-check"></i> Simpan Balasan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Row-->
        <!-- Modal Tambah Admin -->
        <div class="modal fade" id="tambahPengaduanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Data Pengaduan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('pengaduan/tambah_pengaduan') ?>" method="post">
                            <div class="form-group">
                                <label>Nama Pengadu</label>
                                <input type="text" name="nama_pengadu" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>NIK Pengadu</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="nik_pengadu" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email Pengadu</label>
                                <input type="email" name="email_pengadu" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Pengaduan</label>
                                <input type="text" name="jenis_pengaduan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Pengaduan</label>
                                <textarea name="isi_pengaduan" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>RT Pengadu</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" name="rt_pengadu" maxlength="2" class="form-control" required>
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