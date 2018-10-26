<?php $url = "/crecerem";  ?>

    
    <!-- Bootstrap JS-->
    <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js" integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8=" crossorigin="anonymous"></script>
    <script>
    $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '< Ant',
    nextText: 'Sig >',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $(function () {
    $("#fecha").datepicker();
    });
    </script>
    <script src="<?php echo $url; ?>/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo $url; ?>/assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo $url; ?>/assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo $url; ?>/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo $url; ?>/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/select2/select2.min.js">
    </script>
    <!-- Main JS-->
    <script src="<?php echo $url; ?>/assets/js/main.js"></script>
    <script src="<?php echo $url; ?>/assets/js/header.js"></script>
    <!-- CALENDARIO JS -->
    <script src="<?php echo $url; ?>/assets/calendar/date-prototype-functions.js"></script>
    <script src="<?php echo $url; ?>/assets/calendar/daleperro.js"></script>
    <script src="<?php echo $url; ?>/assets/calendar/cities-menu.js"></script>
    <script src="<?php echo $url; ?>/assets/eventgenerator/app.js"></script>
    
</body>
</html>
<!-- end document-->