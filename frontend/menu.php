<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Cursos</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">NUCLEO SOFTWARE</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Panel Control
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="crear-estudiante" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear Estudiante</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--AQUI DEBE DIBUJAR EL MENU-->
                <?php
                include 'controller/conexion.php';

                $menu = "SELECT * FROM menu";
                $submenu = "SELECT * FROM submenu";

                foreach ($conexion->query($menu) as $rs1) {
                    if ($rs1['estado'] == 1) {
                        $textoMenu = $rs1['nombre'];
                        $codificacionMenu = mb_detect_encoding($textoMenu, "UTF-8, ISO-8859-1");
                        $textoMenu = iconv($codificacionMenu, 'UTF-8', $textoMenu);

                        echo "<li class='nav-item'>";
                        echo "<a href='#' class='nav-link'>";
                        echo "<i class='" . $rs1['icono'] . "'></i>";
                        echo '<p>';
                        echo "<span>" . $textoMenu . "</span>";
                        echo "<i class='fas fa-angle-left right'></i>";
                        echo '</p>';
                        echo "</a>";

                        echo "<ul class='nav nav-treeview'>";
                        foreach ($conexion->query($submenu) as $rs2) {
                            $textoSubmenu = $rs2['nombre'];
                            $codificacionSubmenu = mb_detect_encoding($textoSubmenu, "UTF-8, ISO-8859-1");
                            $textoSubmenu = iconv($codificacionSubmenu, 'UTF-8', $textoSubmenu);

                            if ($rs2['fk_menu'] == $rs1['idmenu'] && $rs2['estado'] == 1) {
                                echo "<li class='nav-item'><a href='" . $rs2['url'] . "' class='nav-link'><i class='" . $rs2['icono'] . "'></i><p>" . $textoSubmenu . "</p></a></li>";
                            }
                        }
                        echo "</ul>";
                        echo "</li>";
                    }
                }

                ?>
            </ul>
        </nav>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="index2" class="d-block">index2.php</a>
            </div>
        </div>
    </div>
</aside>