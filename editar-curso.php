<!DOCTYPE html>
<html lang="es">

<?php
include "frontend/head.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="Logo" height="100" width="100">
        </div>

        <?php
        include "frontend/barra_superior.php";
        include "frontend/menu.php";
        ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Editar Curso</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Cursos</a></li>
                                <li class="breadcrumb-item active">Editar Curso</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <?php

                    $key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";

                    $id = intval(base64_decode($_GET['id'] . $key));
                    $sql = mysqli_query($conexion, "SELECT*FROM  test_courses c WHERE c.c_id = '$id'");
                    $row = mysqli_fetch_assoc($sql);

                    ?>

                    <div class="row">
                        <section class="col-lg-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Datos del Curso</h3>
                                            </div>
                                            <form role="form" action="controller/actualizar_curso" method="POST" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-6">
                                                            <input type="hidden" class="form-control" value="<?php echo $row['c_id']; ?>" id="idcurso" name="idcurso">

                                                            <div class="form-group">
                                                                <label for="nombre">Nombre del Curso <i style="color: red">*</i></label>
                                                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" id="nombre" name="nombre" placeholder="Digite nombre del Curso" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="creditos">Cr??ditos <i style="color: red">*</i></label>
                                                                <input type="number" class="form-control" value="<?php echo $row['credits']; ?>" id="creditos" name="creditos" onkeypress="return soloNumeros(event)" placeholder="Digite cr??ditos del Curso" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3"></div>
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary float-right">Actualizar Curso </button>
                                                    <a href="gestionar-curso" class="btn btn-danger float-right"> Cancelar</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="col-lg-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Cursos Creados</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="table_ajax" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Nombres</th>
                                                                <th>Cr??ditos</th>
                                                                <th>Acci??n</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
        <?php
        include "frontend/footer.php";
        ?>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <?php
    include "frontend/script.php";
    ?>

    <script>
        $(function() {
            $("#table_ajax").DataTable({
                "sAjaxSource": "consultas_ajax/sql_gestionar_curso.php",
                "aoColumns": [{
                        mData: 'nombres'
                    },
                    {
                        mData: 'creditos'
                    },
                    {
                        mData: 'accion'
                    },
                ],
                retrieve: true,
                dom: 'Blfrtip',
                "pageLength": 10,
                "order": [
                    [1, "asc"]
                ],
                "columnDefs": [{
                    "visible": false,
                    "searchable": true,
                }],
                "responsive": true,
                "paging": true,
                "searching": true,
                "lengthChange": false,
                "autoWidth": false,
                "stateSave": true,
                //"buttons": ["excel", "pdf", "colvis"],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print', "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>