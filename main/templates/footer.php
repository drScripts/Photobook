<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy;PhotoBook Story 2020</span>
        </div>
    </div>
</footer>
<!-- Bootstrap core JavaScript-->
<script src=" assets/vendor/jquery/jquery.min.js"></script>
<script src=" assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script>
<!-- wow -->
<script src="assets/wow/wow.min.js"></script>
<script>
$(document).ready(function() {
    $(".btn-tambah").on("click", function() {
        $(".letak-input").append(
            "<input class='form-control mb-2' type='file' name='foto[]' multiple>");
    })
});
</script>

</body>

</html>