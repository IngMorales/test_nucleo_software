<?php
$key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
 $estudiante = $_POST["estudiante"];
 $curso = $_POST["curso"];

 $id_user = base64_encode($estudiante.$key);

include("conexion.php");

	$insertar = "INSERT INTO test_courses_x_student (c_id, s_id) 
	VALUES ('$curso', '$estudiante')";

	if ($conexion->query($insertar) == true) {
		header('location: ../alertas.php?msj=EL CURSO HA SIDO ASIGNADO CORRECTAMENTE.&c=stack1&p=administrar_curso&t=success&id='.$id_user);
	} else {
		header('location: ../alertas.php?msj=HA OCURRIDO UN ERROR AL ASIGNAR EL CURSO, POR FAVOR INTENTE DE NUEVO O CONSULTE CON SOPORTE.&c=stack1&p=asignar_curso&t=warning');
	}

	$conexion->close();
?>
