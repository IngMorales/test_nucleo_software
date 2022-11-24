<?php
include( "conexion.php" );

$key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
$id_estudiante = intval(base64_decode($_GET['idestudiante'] . $key));
$id_curso = intval(base64_decode($_GET['idcurso'] . $key));

$id_user = base64_encode($id_estudiante.$key);
$id_course = base64_encode($id_curso.$key);


    $eliminar = "DELETE FROM test_courses_x_student WHERE  cxs_id = '$id_curso' AND s_id = '$id_estudiante'";
	
	if ( $conexion->query( $eliminar ) == true ) { 
		header('location: ../alertas.php?msj=SE QUITO EL CURSO DEL ESTUDIANTE&c=stack1&p=administrar_curso&t=success&id='.$id_user);
	} else {
		header('location: ../alertas.php?msj=ERROR QUITAR EL CURSO, POR FAVOR VUELVA A INTENTARLO O CONSULTE CON SOPORTE&c=stack1&p=administrar_curso&t=warning&id='.$id_user);
	}	

$conexion->close();
?>