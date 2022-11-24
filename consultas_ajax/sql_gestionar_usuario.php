<?php
include("../controller/conexion.php");

    $sql = "SELECT s.s_id idestudiante, s.first_name nombre, s.last_name apellido, s.grupo grupo, s.email correo, s.phone_number telefono, COUNT(t.s_id) cursos, s.`status` estado
    FROM test_courses_x_student t
    RIGHT JOIN test_students s ON t.s_id = s.s_id
    GROUP BY s.s_id";

$result = mysqli_query($conexion, $sql);
$key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
$c = 0;

while ($fila = $result->fetch_assoc()) {

    $data[$c]["nombres"] = "<p>" . mb_strtoupper($fila["nombre"] . " " . $fila["apellido"]) . "</p>";
    $data[$c]["telefono"] = "<p>" . $fila["telefono"] . "</p>";
    $data[$c]["correo"] = "<p>" . $fila["correo"] . "</p>";
    $data[$c]["grupo"] = "<p>" . $fila["grupo"] . "</p>";
    $data[$c]["cursos"] = "<p>" . $fila["cursos"] . "</p>";

    //aqui meto los enlaces
    $usuario_id = base64_encode($fila['idestudiante'] . $key);

    if ($fila["estado"] == 1) {
        $estado = 'INACTIVO';
        $color = 'btn btn-success';
        $link = "controller/estado_estudiante?id=" . $usuario_id . "&desactivar=1";
        $nombre = "ACTIVAR";
    } else {
        $estado = 'ACTIVO';
        $color = 'btn btn-danger';
        $link = "controller/estado_estudiante?id=" . $usuario_id . "&activar=1";
        $nombre = "INACTIVAR";
    }

    $data[$c]["accion"] = "<center>
    <a class='btn btn-primary' href='editar-datos?id=" . $usuario_id . "' title='Editar Usuario'>Editar</a>
    <a class='btn btn-warning' href='administrar-estudiante?id=" . $usuario_id . "' title='Administrar'>Administrar Cursos</a>
    <a class='".$color."' href='".$link."' title='Estado Estudiante'>".$nombre."</a>
    </center>";
    
    $data[$c]["estado"] = "<p>" . $estado . "</p>";
    $c++;
}

$results = [
    "sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data
];

echo json_encode($results);

$conexion->close();
?>
