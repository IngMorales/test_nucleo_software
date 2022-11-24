<?php
$host_name = 'localhost'; 
$database = 'nucleo_software_aula'; 
$user_name = 'root'; 
$password = 'ingmorales'; 

$conexion = mysqli_connect( $host_name, $user_name, $password, $database );
if ( mysqli_errno( $conexion ) ) {
	//die('<p>No se Conecto a la Base de Datos: '.mysqli_error().'</p>');
} else {
	//echo '<p>Conectado al Servidor Correctamente.</p >';
}

$acentos = $conexion->query( "SET NAMES 'utf8'" )
?>