<?php

$GLOBALS['cantDTF']="";
$GLOBALS['cantTRF']="";
$GLOBALS['tCombustibleF']="";
$GLOBALS['tAceiteF']="";
$GLOBALS['tEngraseF']="";
$GLOBALS['tLlantasF']="";
$GLOBALS['tMelectricoF']="";
$GLOBALS['tMmecanicoF']="";
$GLOBALS['tLavadoF']="";
$GLOBALS['cCombustibleF']="";
$GLOBALS['cAceiteF']="";
$GLOBALS['cEngraseF']="";
$GLOBALS['cLlantasF']="";
$GLOBALS['cMelectricoF']="";
$GLOBALS['cMmecanicoF']="";
$GLOBALS['cLavadoF']="";
$GLOBALS['tArrumeF']="";
$GLOBALS['tMezclaF']="";
$GLOBALS['tUsoF']="";

if(isset($_POST['generarInforme'])){
    $cantDTF = $_SESSION['cantidaDT'];
    $cantTRF = $_SESSION['cantidadTR'];
    $tCombustibleF = $_SESSION['tCombustible'];
    $tAceiteF = $_SESSION['tAceite'];
    $tEngraseF = $_SESSION['tEngrase'];
    $tLlantasF = $_SESSION['tLlantas'];
    $tMelectricoF = $_SESSION['tMelectrico'];
    $tMmecanicoF = $_SESSION['tMmecanico'];
    $tLavadoF = $_SESSION['tLavado'];
    $cCombustibleF = $_SESSION['cCombustible'];
    $cAceiteF = $_SESSION['cAceite'];
    $cEngraseF = $_SESSION['cEngrase'];
    $cLlantasF = $_SESSION['cLlantas'];
    $cMelectricoF = $_SESSION['cMelectrico'];
    $cMmecanicoF = $_SESSION['cMmecanico'];
    $cLavadoF = $_SESSION['cLavado'];
    $tArrumeF = $_SESSION['tArrume'];
    $tMezclaF = $_SESSION['tMezcla'];
    $tUsoF = $_SESSION['tUso'];
}else{
    $cantDTF = $_SESSION['cantidaDT'];
    $cantTRF = $_SESSION['cantidadTR'];
    $tCombustibleF = $_SESSION['tCombustible'];
    $tAceiteF = $_SESSION['tAceite'];
    $tEngraseF = $_SESSION['tEngrase'];
    $tLlantasF = $_SESSION['tLlantas'];
    $tMelectricoF = $_SESSION['tMelectrico'];
    $tMmecanicoF = $_SESSION['tMmecanico'];
    $tLavadoF = $_SESSION['tLavado'];
    $cCombustibleF = $_SESSION['cCombustible'];
    $cAceiteF = $_SESSION['cAceite'];
    $cEngraseF = $_SESSION['cEngrase'];
    $cLlantasF = $_SESSION['cLlantas'];
    $cMelectricoF = $_SESSION['cMelectrico'];
    $cMmecanicoF = $_SESSION['cMmecanico'];
    $cLavadoF = $_SESSION['cLavado'];
    $tArrumeF = $_SESSION['tArrume'];
    $tMezclaF = $_SESSION['tMezcla'];
    $tUsoF = $_SESSION['tUso'];
}