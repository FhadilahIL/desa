<?php if (!$this->session->logged) {
    $this->session->set_flashdata('gagal', 'Untuk download surat harus login terlebih dahulu.');
    redirect('login');
} ?>
<table class="table table-striped table-hover table-responsive">
    <thead class="bg-dark text-light">
        <th>No.</th>
        <th style="min-width: 700px;">Nama Surat</th>
        <th style="min-width: 357px;" class="text-center">Download Surat</th>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($tampil_surat as $data) { ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= ucwords(str_replace('-', ' ', $data->nama_surat)) ?></td>
                <td align="center"><a href="<?= base_url('/assets/file/') . $data->file_surat ?>" class="btn btn-info"><i class="fas fa-download"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>