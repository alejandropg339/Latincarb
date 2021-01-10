<?php
$GLOBALS['cedulaService']="";
$GLOBALS['estadoCargador']="";
if(isset($_POST['inicia'])){
    $cedulaService=$_SESSION['userService'];
    $estadoCargador=$_SESSION['cargadorEstado'];
    
}else{
    $cedulaService=$_SESSION['userService'];
    $estadoCargador=$_SESSION['cargadorEstado'];
}


