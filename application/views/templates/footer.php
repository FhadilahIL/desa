<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Logout?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin melakukan logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?= date('Y') ?> - Desa Cikande</span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('/') ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/ruang-admin.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/my_script.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable
    });
</script>
</body>

</html>