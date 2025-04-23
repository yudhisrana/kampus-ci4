    <script src="/Assets/js/jquery-1.11.1.min.js"></script>
    <script src="/Assets/js/bootstrap.min.js"></script>
    <script src="/Assets/js/chart.min.js"></script>
    <script src="/Assets/js/chart-data.js"></script>
    <script src="/Assets/js/easypiechart.js"></script>
    <script src="/Assets/js/easypiechart-data.js"></script>
    <script src="/Assets/js/bootstrap-datepicker.js"></script>
    <script src="/Assets/js/bootstrap-table.js"></script>
    <script src="/Assets/js/sweetalert2.min.js"></script>

    <script>
        ! function($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function() {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function() {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
        <?php if (session()->getFlashdata('success')) : ?>
            $(document).ready(function() {
                swal("Success!", "<?php echo $_SESSION['success'] ?>", "success");
            });
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            $(document).ready(function() {
                swal("Sorry!", "<?php echo $_SESSION['error'] ?>", "error");
            });
        <?php endif; ?>
        <?php if (session()->getFlashdata('warning')) : ?>
            $(document).ready(function() {
                swal("Warning!", "<?php echo $_SESSION['warning'] ?>", "warning");
            });
        <?php endif; ?>
        <?php if (session()->getFlashdata('info')) : ?>
            $(document).ready(function() {
                swal("Info!", "<?php echo $_SESSION['info'] ?>", "info");
            });
        <?php endif; ?>
    </script>
    </body>

    </html>