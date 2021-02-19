<?php
include_once('con_db.php');
include_once('servicio.php');
include_once('global.php');
//include_once('global3.php');



$consultaCargador = "SELECT fecha_inicial, cargador_id FROM mantenimiento WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaG'";
$resultadoCargador2 = mysqli_query($conexion, $consultaCargador);
$resultadoFechaInicial = mysqli_fetch_row($resultadoCargador2);
$resultadoFinalCargador2 = $resultadoFechaInicial[0];
$resultadoFinalCargador3 = $resultadoFechaInicial[1];

if (isset($_POST['finMantenimiento'])) {

    if (strlen($_POST['costMantenimiento']) >= 3) {

        $costo = $_POST['costMantenimiento'];

        $busqueda = "SELECT id, cargador_id FROM mantenimiento WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaG'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateMantenimiento = "UPDATE `mantenimiento` SET `costo` = '$costo', `fecha_final` = NOW() WHERE `mantenimiento`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateMantenimiento);

        if ($resultadoUpdate) {
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$resultadoFinalBusqueda[1]'";
            $updateResultado2 = mysqli_query($conexion, $updateEstado2);
            header('location: index.php');
        } else {
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    } else {
        echo '<script type="text/javascript">
            alert("El mantenimiento debe tener un valor igual o mayor a 3 cifras");
            window.location.href="#";
            </script>
            ';
    }
} else {
    echo '<script type="text/javascript">
        alert("Hay un mantenimiento en curso por favor Terminelo dijitando el costo de este.");
        window.location.href="#";
        </script>
        ';
}
