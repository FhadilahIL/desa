<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url('/') ?>assets/img/logo/logo.png" rel="icon">
    <title>Login - Desa Cikande</title>
    <link href="<?= base_url('/') ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('/') ?>assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login - Desa Cikande</h1>
                                    </div>
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
                                    <form class="user" action="<?= base_url('auth/login_warga') ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required name="nik" placeholder="Masukan NIK Anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" required name="password" id="password" placeholder="Masukan Password Anda">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" onclick="viewPass()" id="customCheckViewPass">
                                                <label class="custom-control-label" for="customCheckViewPass">Lihat Password</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                            <a href="<?= base_url() ?>" class="btn btn-success btn-block">Ke Beranda</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="<?= base_url('/') ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/') ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('/') ?>assets/js/ruang-admin.min.js"></script>
    <script>
        function viewPass() {
            var passCheck = document.getElementById('customCheckViewPass')
            var passInput = document.getElementById('password')
            if (passCheck.checked == true) {
                passInput.setAttribute('type', 'text')
            } else {
                passInput.setAttribute('type', 'password')
            }
        }
    </script>
</body>

</html>