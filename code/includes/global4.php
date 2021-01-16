<?php

$GLOBALS['cantDTF']="";
$GLOBALS['cantTRF']="";
$GLOBALS['tArrumeF']="";
$GLOBALS['tMezclaF']="";

if(isset($_POST['generarInforme'])){
    $cantDTF = $_SESSION['cantidaDT'];
    $cantTRF = $_SESSION['cantidadTR'];
    $tArrumeF = $_SESSION['tArrume'];
    $tMezclaF = $_SESSION['tMezcla'];
}else{
    $cantDTF = $_SESSION['cantidaDT'];
    $cantTRF = $_SESSION['cantidadTR'];
    $tArrumeF = $_SESSION['tArrume'];
    $tMezclaF = $_SESSION['tMezcla'];
}