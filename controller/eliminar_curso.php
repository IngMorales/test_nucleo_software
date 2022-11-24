<?php
include( "conexion.php" );

$key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
$id_curso = intval(base64_decode($_GET['id'] . $key));

$id_course = base64_encode($id_curso.$key);

    $eliminar = "DELETE FROM test_courses WHERE c_id = '$id_curso'";
	
	if ( $conexion->query( $eliminar ) == true ) { 
		header('location: ../alertas.php?msj=SE ELIMINO EL CURSO DEL SISTEMA&c=stack1&p=eliminar_curso&t=success');
	} else {
		header('location: ../alertas.php?msj=ERROR AL ELIMINAR EL CURSO, POR FAVOR VUELVA A INTENTARLO O CONSULTE CON SOPORTE&c=stack1&p=eliminar_curso&t=warning');
	}	

$conexion->close();
?>