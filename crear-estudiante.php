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
                            <h1 class="m-0">Crear Estudiante</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Estudiantes</a></li>
                                <li class="breadcrumb-item active">Crear Estudiante</li>
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
                                                <h3 class="card-title">Datos básicos del Estudiante</h3>
                                            </div>
                                            <form role="form" action="controller/registro_estudiante" method="POST" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">


                                                            <div class="form-group">
                                                                <label for="nombre">Primer Nombre <i style="color: red">*</i></label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)" placeholder="Digite Primer Nombre" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="apellido">Apellido <i style="color: red">*</i></label>
                                                                <input type="text" class="form-control" id="apellido" name="apellido" onkeypress="return soloLetras(event)" placeholder="Digite Apellido" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="grupo">Grupo <i style="color: red">*</i></label>
                                                                <input type="text" class="form-control" id="grupo" name="grupo" onkeypress="return soloLetras(event)" placeholder="Digite Grupo" required>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <label for="correo">Correo <i style="color: red">*</i></label>
                                                                <input type="email" class="form-control" id="correo" name="correo" onKeyUp="javascript:validarCorreo('correo')" onblur="may(this.value, this.id)" placeholder="Digite Correo" required>
                                                                <div class="validacion_correo"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="telefono">Teléfono <i style="color: red">*</i></label>
                                                                <input type="number" class="form-control" id="telefono" name="telefono" onkeypress="return soloNumeros(event)" onblur="may(this.value, this.id)" placeholder="Digite Número de Teléfono" required>
                                                                <div class="validacion_telefono"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="location">Geolocation <i style="color: red">*</i></label>
                                                                <input type="text" class="form-control" id="location" name="location" value="6.171133491565565,-75.33362885177205" required>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary float-right">Crear Estudiante</button>
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

    <script type="text/javascript">

        $('#correo').change(function() {
            $.post('frontend/validacion_correo.php', {
                correo: $('#correo').val(),

                beforeSend: function() {
                    $('.validacion_correo').html("Espere un momento por favor...");
                }
            }, function(respuesta) {
                $('.validacion_correo').html(respuesta)
            });
        });

        $('#telefono').change(function() {
            $.post('frontend/validacion_telefono.php', {
                telefono: $('#telefono').val(),

                beforeSend: function() {
                    $('.validacion_telefono').html("Espere un momento por favor...");
                }
            }, function(respuesta) {
                $('.validacion_telefono').html(respuesta)
            });
        });
    </script>

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