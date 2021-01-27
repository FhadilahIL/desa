<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Berita</li>
        </ol>
    </div>
    <!-- Isi -->
    <a class="btn btn-primary mb-3" href="javascript:void(0);" data-toggle="modal" data-target="#tambahBeritaModal">
        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
        Tambah Data Berita
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
                            <th style="min-width: 300px;">Judul Berita</th>
                            <th style="min-width: 300px;">Posted By</th>
                            <th style="min-width: 350px;">Tanggal Publikasi Berita</th>
                            <th style="min-width: 150px;">Action</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($tampil_berita as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= ucwords(str_replace('-', ' ', $data->judul_berita)) ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->news_created ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/detail_berita/') . md5($data->id_berita) ?>" class="btn btn-info"><i class="fas fa-info fa-fw"></i></a>
                                        <a href="<?= base_url('admin/ubah_berita/') . md5($data->id_berita) ?>" class="btn btn-warning"><i class="fas fa-edit fa-fw"></i></a>
                                        <!-- <a href="<?= base_url('admin/hapus_berita/') . md5($data->id_berita) ?>" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></a> -->
                                        <a class="btn btn-danger" href="javascript:void(0);" data-toggle="modal" data-target="#hapusBeritaModal<?= md5($data->id_berita) ?>">
                                            <i class="fas fa-trash fa-sm fa-fw"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Modal Hapus Berita -->
                                <div class="modal fade" id="hapusBeritaModal<?= md5($data->id_berita) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelLogout">Hapus Berita</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin untuk menghapus data berita dengan judul <b><?= ucwords(str_replace('-', ' ', $data->judul_berita)) ?></b> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="<?= base_url('berita/hapus_berita/') . md5($data->id_berita) ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus Data Berita</a>
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
        <!-- Modal Tambah Berita -->
        <div class="modal fade" id="tambahBeritaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTambahAdmin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Berita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('berita/tambah_berita') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" class="form-control" name="judul_berita" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Berita</label>
                                <textarea name="isi_berita" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Berita</label>
                                <input type="file" accept=".jpeg, .png, .jpg" class="form-control-file" name="gambar_berita" required>
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