<?php
include_once('con_db.php');
include_once('global2.php');
include_once('servicio.php');


$busqueda2 = "SELECT fecha_inicial FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
$resultadoBusqueda2 = mysqli_query($conexion, $busqueda2);
$resultadoFechaInicial = mysqli_fetch_row($resultadoBusqueda2);
$resultadoFinalBusqueda2 = $resultadoFechaInicial[0];

if (isset($_POST['finServiceMas'])) {
    $cantidadDoble = $_POST['cantDobletroque'];
    $cantidadTracto = $_POST['cantTractomula'];

    if (strlen($_POST['cantDobletroque']) >= 1 && strlen($_POST['cantTractomula']) >= 1) {

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET `cantidad_dobletroque` = '$cantidadDoble', `cantidad_tractomulas` = '$cantidadTracto', `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        if ($resultadoUpdate) {
            header('location: index-operario.php');
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$estadoCargador'";
            $updateResultado2 = mysqli_query($conexion, $updateEstado2);
        } else {
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    } elseif (strlen($_POST['cantDobletroque']) >= 1) {

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET `cantidad_dobletroque` = '$cantidadDoble', `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        if ($resultadoUpdate) {
            header('location: index.php');
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$estadoCargador'";
            $updateResultado2 = mysqli_query($conexion, $updateEstado2);
        } else {
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    } elseif (strlen($_POST['cantTractomula']) >= 1) {

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET `cantidad_tractomulas` = '$cantidadTracto', `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        if ($resultadoUpdate) {
            header('location: index.php');
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$estadoCargador'";
            $updateResultado2 = mysqli_query($conexion, $updateEstado2);
        } else {
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
        //TODO: AGREGAR FINALIZAR SERVICIO SIN CANTIDAD DE DOBLETROQUE NI TRACTOMULA
    } elseif (strlen($_POST['cantTractomula']) == 0 && strlen($_POST['cantTractomula']) == 0) {
        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET  `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        if ($resultadoUpdate) {
            header('location: index.php');
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$estadoCargador'";
            $updateResultado2 = mysqli_query($conexion, $updateEstado2);
        } else {
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    }
}
