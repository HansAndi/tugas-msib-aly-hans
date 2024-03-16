<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://saugi.me">Saugi</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= BASE_URL; ?>/assets/static/js/components/dark.js"></script>
<script src="<?= BASE_URL; ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/compiled/js/app.js"></script>

<!-- Need: Apexcharts -->
<script src="<?= BASE_URL; ?>/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/static/js/pages/dashboard.js"></script>

<script src="<?= BASE_URL; ?>/js/script-edit.js"></script>

<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

</body>

</html>