<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Cikande - <?= $judul ?></title>
    <link rel="shortcut icon" href="<?= base_url('/assets/img/settings/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.css') ?>">
    <link href="<?= base_url('/') ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('/') ?>assets/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('/assets/img/settings/logo.png') ?>" width="30px"> <b>Desa Cikande</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile Desa
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('struktur_organisasi') ?>">Struktur Organisasi</a>
                            <a class="dropdown-item" href="<?= base_url('visi_misi') ?>">Visi Misi</a>
                            <a class="dropdown-item" href="<?= base_url('lokasi') ?>">Letak Geografis</a>
                            <a class="dropdown-item" href="<?= base_url('info_rw_dan_kejaroan') ?>">Info RW dan Kejaroan</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dokumen_surat') ?>">Dokumen Surat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('form_pengaduan') ?>">Form Pengaduan</a>
                    </li>
                    <?php if ($this->session->logged) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('profile') ?>">My Profile</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <?= $this->session->logged ? '<a class="nav-link" href="' . base_url('logout') . '">Logout</a>' : '<a class="nav-link" href="' . base_url('login') . ' ">Login</a>'; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <marquee behavior="" direction="">Selamat Datang Di Website Desa Cikande</marquee>
        <h1><?= $judul ?></h1>