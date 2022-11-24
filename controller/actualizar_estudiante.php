<?php
include( "conexion.php" );

$id = intval( $_POST[ 'idestudiante' ] );

$nombre = mysqli_real_escape_string( $conexion, ( strip_tags( mb_strtoupper($_POST[ 'nombre' ]), ENT_QUOTES ) ) );
$apellido = mysqli_real_escape_string( $conexion, ( strip_tags( mb_strtoupper($_POST[ 'apellido' ]), ENT_QUOTES ) ) );
$grupo = mysqli_real_escape_string( $conexion, ( strip_tags( mb_strtoupper($_POST[ 'grupo' ]), ENT_QUOTES ) ) );
$correo = mysqli_real_escape_string( $conexion, ( strip_tags( $_POST[ 'correo' ], ENT_QUOTES ) ) );
$telefono = mysqli_real_escape_string( $conexion, ( strip_tags( $_POST[ 'telefono' ], ENT_QUOTES ) ) );
$location = mysqli_real_escape_string( $conexion, ( strip_tags( $_POST[ 'location' ], ENT_QUOTES ) ) );

$key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
$id_user = base64_encode($id.$key);

	$actualizar = "UPDATE test_students SET first_name = '$nombre', last_name = '$apellido', grupo = '$grupo', email = '$correo', phone_number = '$telefono', geolocation = '$location' WHERE s_id='$id'";
	
	if ( $conexion->query( $actualizar ) == true ) { 
		header('location: ../alertas.php?msj=EL ESTUDIANTE SE HA ACTUALIZADO DE FORMA CORRECTA&c=stack1&p=editar_datos&t=success&id=' . $id_user);
	} else {
		header('location: ../alertas.php?msj=ERROR AL ACTUALIZAR AL ESTUDIANTE, POR FAVOR VUELVA A INTENTARLO O CONSULTE CON SOPORTE&c=stack1&p=editar_datos&t=warning&id=' . $id_user);
	}	

$conexion->close();
?>