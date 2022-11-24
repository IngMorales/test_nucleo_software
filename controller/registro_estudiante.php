<?php
 $nombre = $_POST["nombre"];
 $apellido = $_POST["apellido"];
 $lv_id = rand(1,5);
 $grupo = $_POST["grupo"];
 $correo = $_POST["correo"];
 $telefono = $_POST["telefono"];
 $location = $_POST["location"];

include("conexion.php");

	$insertar = "INSERT INTO test_students (first_name, last_name, lv_id, grupo, email, phone_number, geolocation) 
	VALUES ('$nombre', '$apellido', '$lv_id', '$grupo', '$correo', '$telefono', '$location')";

	if ($conexion->query($insertar) == true) {
		header('location: ../alertas.php?msj=EL ESTUDIANTE: '.$nombre.' '.$apellido.' SE HA CREADO CORRECTAMENTE.&c=stack1&p=crear_estudiante&t=success');
	} else {
		header('location: ../alertas.php?msj=HA OCURRIDO UN ERROR AL CREAR EL USUARIO, POR FAVOR INTENTE DE NUEVO O CONSULTE CON SOPORTE.&c=stack1&p=crear_estudiante&t=warning');
	}

	$conexion->close();
?>
