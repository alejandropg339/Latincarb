<?php
include_once('con_db.php');

$consultaUsuario = "SELECT cedula, nombre, apellido FROM usuario WHERE rol_id=3";

$resultadoUsuario = mysqli_query($conexion,$consultaUsuario);