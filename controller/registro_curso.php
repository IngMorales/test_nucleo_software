<?php
 $nombre = $_POST["nombre"];
 $creditos = $_POST["creditos"];


include("conexion.php");

	$insertar = "INSERT INTO test_courses (name, credits) 
	VALUES ('$nombre', '$creditos')";

	if ($conexion->query($insertar) == true) {
		header('location: ../alertas.php?msj=EL CURSO: '.$nombre.' SE HA CREADO CORRECTAMENTE.&c=stack1&p=crear_curso&t=success');
	} else {
		header('location: ../alertas.php?msj=HA OCURRIDO UN ERROR AL CREAR EL CURSO, POR FAVOR INTENTE DE NUEVO O CONSULTE CON SOPORTE.&c=stack1&p=crear_curso&t=warning');
	}

	$conexion->close();
?>
