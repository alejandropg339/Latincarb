<?php
include_once('con_db.php');

if(isset($_POST['generaInforme'])){
    $usuario = $_POST['opUsuario'];
    echo $usuario;
}