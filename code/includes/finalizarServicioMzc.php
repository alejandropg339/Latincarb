<?php
include_once('con_db.php');
include_once('global2.php');
include_once('servicio.php');


        $busqueda2 = "SELECT fecha_inicial FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda2 = mysqli_query($conexion, $busqueda2);
        $resultadoFechaInicial = mysqli_fetch_row($resultadoBusqueda2);
        $resultadoFinalBusqueda2=$resultadoFechaInicial[0];

if (isset($_POST['finServiceMzc'])) {

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        if($resultadoUpdate){
            header('location: index-operario.php');
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$estadoCargador'";
                    $updateResultado2 = mysqli_query($conexion, $updateEstado2);
        }else{
            echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
}