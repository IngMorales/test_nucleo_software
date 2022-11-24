<?php
include( "conexion.php" );

$key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
$id = intval(base64_decode($_GET['id'] . $key));
$id_user = base64_encode($id.$key);

    if ($_GET['activar'] == '1') {
        $actualizar = "UPDATE test_students SET status = '1' WHERE s_id='$id'";
    }elseif ($_GET['desactivar'] == '1') {
        $actualizar = "UPDATE test_students SET status = '0' WHERE s_id='$id'";
    }
	
	if ( $conexion->query( $actualizar ) == true ) { 
		header('location: ../alertas.php?msj=SE ACTUALIZO EL ESTADO DEL ESTUDIANTE&c=stack1&p=actualizar_estado&t=success');
	} else {
		header('location: ../alertas.php?msj=ERROR AL ACTUALIZAR AL ESTUDIANTE, POR FAVOR VUELVA A INTENTARLO O CONSULTE CON SOPORTE&c=stack1&p=actualizar_estado&t=warning');
	}	

$conexion->close();
?>