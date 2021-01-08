<?php

include_once('con_db.php');
$cargador1=1;
$cargador2=2;


$consulta1 = "SELECT estado FROM cargador where id='$cargador1'";
$resultado1 = mysqli_query($conexion,$consulta1);

$resultadof1 = mysqli_fetch_row($resultado1);
$estado1=(int)$resultadof1[0];

$consulta2 = "SELECT estado FROM cargador where id='$cargador2'";
$resultado2 = mysqli_query($conexion,$consulta2);

$resultadof2 = mysqli_fetch_row($resultado2);
$estado2=(int)$resultadof2[0];