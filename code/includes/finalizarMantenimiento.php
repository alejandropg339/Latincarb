<?php
include_once('con_db.php');
include_once('global2.php');
include_once('servicio.php');
include_once('global.php');


if (isset($_POST['finMantenimiento'])) {


    if (strlen($_POST['costMantenimiento'])>=3) {

        $costo = $_POST['costMantenimiento'];

        $busqueda = "SELECT id FROM mantenimiento WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaG'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateMantenimiento = "UPDATE `mantenimiento` SET `costo` = '$costo', `fecha_final` = NOW() WHERE `mantenimiento`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateMantenimiento);

        if($resultadoUpdate){
            header('location: index.php');
            $updateEstado2 = "UPDATE `cargador` SET `estado` = '1' WHERE `cargador`.`id` = '$estadoCargador'";
                    $updateResultado2 = mysqli_query($conexion, $updateEstado2);
        }else{
            echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    }else{
        echo'<script type="text/javascript">
            alert("El mantenimiento debe tener un valor igual o mayor a 3 cifras");
            window.location.href="#";
            </script>
            ';
    }
}