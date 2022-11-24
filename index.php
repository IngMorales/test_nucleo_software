<!DOCTYPE html>
<html lang="es">

<?php
include "frontend/head.php";
?>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="Logo" height="100" width="100">
        </div>
        <?php
        include "frontend/barra_superior.php";
        include "frontend/menu.php";
        ?>

        <section class="content">
            <div class="container-fluid">
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
                    <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
                        <a class="nav-link bg-danger" href="index" role="button" aria-haspopup="true" aria-expanded="false">Control</a>
                        
                        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
                        <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
                        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
                        <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-empty">
                            <h2 class="display-4">¡Ninguna pestaña seleccionada!</h2>
                        </div>
                        <div class="tab-loading">
                            <div>
                                <h2 class="display-4">La pestaña se está cargando <i class="fa fa-sync fa-spin"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        include "frontend/footer.php";
        ?>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <?php
    include "frontend/script.php";
    ?>
</body>

</html>