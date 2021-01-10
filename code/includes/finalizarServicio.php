<?php
include_once('con_db.php');
include_once('global2.php');
include_once('servicio.php');
//include_once('./nuevo-servicio.php');


if (isset($_POST['finServiceDt'])) {

    /*echo'<script type="text/javascript">
    alert("Algo Salio mal por favor intentelo de nuevo");
    window.location.href="#";
    </script>
    ';*/

    if (strlen($_POST['cantDobletroque'])>=1) {
        $cedula = $_SESSION['username'];
        $cantidad = $_POST['cantDobletroque'];

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= '$cedulaService'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);
        $resultadoFinalBusqueda = mysqli_fetch_row($resultadoBusqueda);


        $updateServicio = "UPDATE `servicio` SET `cantidad_dobletroque` = '$cantidad', `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoFinalBusqueda[0]';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        echo "".$resultadoUpdate;

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
}else{
    /*echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo cabron'.$cedulaService.'");
            window.location.href="#";
            </script>
            ';*/
}

