<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Surat</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Surat</li>
        </ol>
    </div>
    <!-- Isi -->
    <a class="btn btn-primary mb-3" href="javascript:void(0);" data-toggle="modal" data-target="#tambahSuratModal">
        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
        Tambah Data Surat
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
                            <th style="min-width: 300px;">Nama Surat</th>
                            <th style="min-width: 350px;">File</th>
                            <th style="min-width: 150px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($tampil_surat as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= ucwords(str_replace('-', ' ', $data->nama_surat)) ?></td>
                                    <td><?= $data->file_surat ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="javascript:void(0);" data-toggle="modal" data-target="#ubahSuratModal<?= md5($data->id_surat) ?>">
                                            <i class="fas fa-edit fa-sm fa-fw"></i>
                                        </a>
                                        <a class="btn btn-danger" href="javascript:void(0);" data-toggle="modal" data-target="#hapusSuratModal<?= md5($data->id_surat) ?>">
                                            <i class="fas fa-trash fa-sm fa-fw"></i>
                                        </a>
                                        <!-- <a href="" class="btn btn-warning"><i class="fas fa-edit fa-fw"></i></a> -->
                                    </td>
                                </tr>
                                <!-- Modal Edit Surat -->
                                <div class="modal fade" id="ubahSuratModal<?= md5($data->id_surat) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelLogout">Ubah Surat</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('surat/edit_surat/') . md5($data->id_surat) ?>" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Nama Surat</label>
                                                        <input type="text" class="form-control" name="nama_surat" value="<?= ucwords(str_replace('-', ' ', $data->nama_surat)) ?>" readonly required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>File Surat</label>
                                                        <input type="file" accept=".docx, .doc" class="form-control-file" name="file_surat" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-outline-success"><i class="fas fa-check"></i> Ubah Surat</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus Surat -->
                                <div class="modal fade" id="hapusSuratModal<?= md5($data->id_surat) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelLogout">Hapus Surat</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus file surat <b><?= ucwords(str_replace('-', ' ', $data->nama_surat)) ?></b> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="<?= base_url('surat/hapus_surat/') . md5($data->id_surat) ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus Surat</a>
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
        <!-- Modal Tambah Surat -->
        <div class="modal fade" id="tambahSuratModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('surat/tambah_surat') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Surat</label>
                                <input type="text" class="form-control" name="nama_surat" required>
                            </div>
                            <div class="form-group">
                                <label>File Surat</label>
                                <input type="file" accept=".docx, .doc" class="form-control-file" name="file_surat" required>
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