<?php
include("../controller/conexion.php");

    $sql = "SELECT*FROM  test_courses";

    $result = mysqli_query($conexion, $sql);
    $key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
    $c = 0;

while ($fila = $result->fetch_assoc()) {

    $data[$c]["nombres"] = "<p>" . mb_strtoupper($fila["name"]) . "</p>";
    $data[$c]["creditos"] = "<p>" . $fila["credits"] . "</p>";
  
    //aqui meto los enlaces
    $id_course = base64_encode($fila['c_id'] . $key);

    $data[$c]["accion"] = "<center>
    <a class='btn btn-primary' href='editar-curso?id=" . $id_course . "' title='Editar Curso'>Editar</a>
    <a class='btn btn-danger' href='controller/eliminar_curso?id=" . $id_course . "' title='Eliminar'>Eliminar</a>
    </center>";
    
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
