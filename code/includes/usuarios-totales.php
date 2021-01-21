<?php
include_once('con_db.php');

$consultaUsuario = "SELECT cedula, nombre, apellido FROM usuario";

$resultadoUsuario = mysqli_query($conexion,$consultaUsuario);

?>