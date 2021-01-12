<?php

include_once('con_db.php');
include_once('global.php');

$consultaCargador = "SELECT fecha_inicial, cargador_id FROM mantenimiento WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaG'";
$resultadoCargador2 = mysqli_query($conexion, $consultaCargador);
$resultadoFechaInicialC = mysqli_fetch_row($resultadoCargador2);
$resultadoFinalCargador2 = "";
$resultadoFinalCargador3 = "";

if ($resultadoFechaInicialC == null) {
    echo "";
} else {
    $resultadoFinalCargador2 = $resultadoFechaInicialC[0];
    $resultadoFinalCargador3 = $resultadoFechaInicialC[1];
}



if (isset($_POST['iniciarMantenimiento'])) {

    if ($resultadoFechaInicialC == null) {
        if (strlen($_POST['opMantenimiento']) >= 1 && isset($_POST['cargador']) >= 1) {
            $mantenimiento = $_POST['opMantenimiento'];
            $GLOBALS['cargador'] = $_POST['cargador'];
            $_SESSION['cargadorEstado'] = $cargador;

            $insertMantenimiento = "INSERT INTO `mantenimiento`(`fecha_inicial`, `tipo_mantenimiento_id`, `usuario_cedula`, `cargador_id`) VALUES (NOW(),'$mantenimiento', '$cedulaG', '$cargador') ";
            $resultadoInsert = mysqli_query($conexion, $insertMantenimiento);

            if ($resultadoInsert) {
                $updateEstado = "UPDATE `cargador` SET `estado` = '0' WHERE `cargador`.`id` = '$cargador'";
                $updateResultado = mysqli_query($conexion, $updateEstado);

                header('location: fin-mantenimiento.php');
            } else {
                echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="mantenimiento.php";
            </script>
            ';
            }
        }
    } else {
        header('location: fin-mantenimiento-validado.php');

    }
}
