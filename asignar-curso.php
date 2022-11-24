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
                            <h1 class="m-0">Asignar Curso</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Estudiantes</a></li>
                                <li class="breadcrumb-item active">Asignar Estudiante</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <section class="col-lg-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Asignar Curso a Estudiante</h3>
                                            </div>
                                            <form role="form" action="controller/asignar_curso" method="POST" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <label>Selecionar Estudiante <i style="color: red">*</i></label>
                                                                <select id="estudiante" name="estudiante" class="form-control select2" style="width: 100%;" required>
                                                                    <option value="">Seleccione Estudiante </option>
                                                                    <?php
                                                                    $student = "SELECT*FROM test_students s WHERE s.status = '1'";
                                                                    foreach ($conexion->query($student) as $sel_student) { ?>
                                                                        <option value="<?php echo $sel_student['s_id']; ?>"><?php echo $sel_student['first_name']." ".$sel_student['last_name']; ?></option>
                                                                    <?php }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Selecionar Curso <i style="color: red">*</i></label>
                                                                <select id="curso" name="curso" class="form-control select2" style="width: 100%;" required>
                                                                    <option value="">Seleccione Curso </option>
                                                                    <?php
                                                                    $course = "SELECT*FROM test_courses c";
                                                                    foreach ($conexion->query($course) as $sel_course) { ?>
                                                                        <option value="<?php echo $sel_course['c_id']; ?>"><?php echo $sel_course['name']." - Créditos: ".$sel_course['credits']; ?></option>
                                                                    <?php }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-3"></div>
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary float-right">Asignar Curso</button>
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
                                                <h3 class="card-title">Estudiantes Registrados en el Sistema</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="table_ajax" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>Nombres</th>
                                                                <th>Teléfono</th>
                                                                <th>Correo</th>
                                                                <th>Grupo</th>
                                                                <th>Cursos</th>
                                                                <th>Acción</th>
                                                                <th>Estado</th>
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
                "sAjaxSource": "consultas_ajax/sql_gestionar_usuario.php",
                "aoColumns": [{
                        mData: 'nombres'
                    },
                    {
                        mData: 'telefono'
                    },
                    {
                        mData: 'correo'
                    },
                    {
                        mData: 'grupo'
                    },
                    {
                        mData: 'cursos'
                    },
                    {
                        mData: 'accion'
                    },
                    {
                        mData: 'estado'
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