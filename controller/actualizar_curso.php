<?php
include( "conexion.php" );

$id = intval( $_POST[ 'idcurso' ] );

$nombre = mysqli_real_escape_string( $conexion, ( strip_tags( mb_strtoupper($_POST[ 'nombre' ]), ENT_QUOTES ) ) );
$credito = mysqli_real_escape_string( $conexion, ( strip_tags( $_POST[ 'creditos' ], ENT_QUOTES ) ) );


$key = "j458t74544sd_yti5487o54q6112we_ty8u86w4e8445we";
$id_course = base64_encode($id.$key);

	$actualizar = "UPDATE test_courses SET name = '$nombre', credits = '$credito' WHERE c_id='$id'";
	
	if ( $conexion->query( $actualizar ) == true ) { 
		header('location: ../alertas.php?msj=EL CURSO SE HA ACTUALIZADO DE FORMA CORRECTA&c=stack1&p=editar_curso&t=success&id=' . $id_course);
	} else {
		header('location: ../alertas.php?msj=ERROR AL ACTUALIZAR EL CURSO, POR FAVOR VUELVA A INTENTARLO O CONSULTE CON SOPORTE&c=stack1&p=editar_curso&t=warning&id=' . $id_course);
	}	

$conexion->close();
?>