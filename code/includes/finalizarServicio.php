<?php
include_once('con_db.php');
include_once('global2.php');
include_once('servicio.php');


if (isset($_POST['finServiceDt'])) {

    if (strlen($_POST['cantDobletroque']) >= 1) {
        $cantidad = $_POST['cantDobletroque'];

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET `cantidad_dobletroque` = '$cantidad', `fecha_final` = (NOW() - INTERVAL 5 HOUR) WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        echo "" . $resultadoUpdate;

        if ($resultadoUpdate) {
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$estadoCargador'";
            $updateResultado2 = mysqli_query($conexion, $updateEstado2);
            header('location: index-operario.php');
        } else {
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    }
}
