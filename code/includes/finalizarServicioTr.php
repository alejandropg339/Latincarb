<?php
include_once('con_db.php');
include_once('global2.php');
include_once('servicio.php');


if (isset($_POST['finServiceTr'])) {

    if (strlen($_POST['cantTractomula']) >= 1) {
        $cantidad = $_POST['cantTractomula'];

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET `cantidad_tractomulas` = '$cantidad', `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

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
