<?php

$GLOBALS['cedulaG']="";
if(isset($_POST['log'])){
    $cedulaG=$_SESSION['userG'];
}else{
    $cedulaG=$_SESSION['userG'];
}

$GLOBALS['cedulaService']="";
if(isset($_POST['log'])){
    $cedulaService=$_SESSION['userService'];
}else{
    $cedulaService=$_SESSION['userService'];
}

