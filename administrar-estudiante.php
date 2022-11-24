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
                            <h1 class="m-0">Administrar Estudiante</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Estudiantes</a></li>
                                <li class="breadcrumb-item active">Administrar Estudiante</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <?php

                    $key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";

                    //Date estudiante
                    $id = intval(base64_decode($_GET['id'] . $key));

                    $sql = mysqli_query($conexion, "SELECT*FROM test_students s WHERE s.s_id = '$id'");
                    $row = mysqli_fetch_assoc($sql);

                    //Datos de cursos
                    $consulta_curso = $conexion->query("SELECT t.cxs_id idestudiante_curso, c.c_id idcurso, c.name curso, c.credits creditos, t.s_id idestudiante
                    FROM test_courses_x_student t
                    INNER JOIN test_courses c ON t.c_id = c.c_id
                    WHERE t.s_id = '$id'");
                    $row_curso = mysqli_num_rows($consulta_curso);
                    ?>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="dist/img/AdminLTELogo.png">
                                            </div>

                                            <h3 class="profile-username text-center"><?php echo $row['first_name'] . " " . $row['last_name']; ?></h3>

                                            <p class="text-muted text-center">Grupo: <?php echo $row['grupo']; ?></p>
                                            <center>
                                                <a href="#" class="btn btn-success">Opción 1</a>
                                                <a href="#" class="btn btn-danger">Opción 2</a>
                                            </center>
                                            <br>

                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Teléfono</b> <a class="float-right"><?php echo $row['phone_number']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Correo</b> <a class="float-right"><?php echo $row['email']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Dirección</b> <a class="float-right"><?php echo $row['geolocation']; ?></a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card card-danger card-outline">
                                        <div class="card-header border-0">
                                            <h2 class="card-title">Cursos del Estudiante</h2>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>Nombre del Curso</th>
                                                            <th>Créditos</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($f = $consulta_curso->fetch_assoc()) {
                                                            $idestudiante = base64_encode($f['idestudiante'] . $key);
                                                            $idcurso = base64_encode($f['idestudiante_curso'] . $key);
                                                        ?>
                                                            <tr align="center">
                                                                <td>
                                                                    <?php echo strtoupper($f['curso']); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $f['creditos']; ?>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a class="btn btn-danger" href="controller/quitar_curso?idcurso=<?php echo  $idcurso; ?>&idestudiante=<?php echo  $idestudiante; ?>" title="Quitar Curso">Quitar</a>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="gestionar-estudiante" class="btn btn-success float-center"> Volver a Gestionar</a>
                                            <a class="btn btn-primary float-center" data-bs-toggle="modal" href="#asignar_curso">Asignar nuevo Curso</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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
    <div class="modal fade" id="asignar_curso" tabindex="-1" role="dialog" aria-labelledby="asignar_curso" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="controller/asignar_curso" method="post">
                    <div class="modal-body">
                        <h4 class="text-uppercase text-center">Asignar Curso a Estudiante</h4>
                        <div class="form-group">
                            <label>Selecionar Curso <i style="color: red">*</i></label>
                            <input type="hidden" class="form-control" value="<?php echo $id; ?>" id="estudiante" name="estudiante">
                            <select id="curso" name="curso" class="form-control select2" style="width: 100%;" required>
                                <option value="">Seleccione Curso </option>
                                <?php
                                $course = "SELECT*FROM test_courses c";
                                foreach ($conexion->query($course) as $sel_course) { ?>
                                    <option value="<?php echo $sel_course['c_id']; ?>"><?php echo $sel_course['name'] . " - Créditos: " . $sel_course['credits']; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <br>
                    </div>
                    <center>
                        <button class="btn btn-success btn-lg text-uppercase" type="submit">Asignar</button>
                    </center>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>