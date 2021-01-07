<?php
$host="localhost";
$user="root";
$password="";
$db="latincarb_db";
$conexion = mysqli_connect($host,$user,$password,$db) or die('Fallo de conexion');
mysqli_set_charset($conexion,"utf8"); 

?>