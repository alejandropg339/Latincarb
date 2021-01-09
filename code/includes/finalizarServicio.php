<?php
include_once('con_db.php');


if (isset($_POST['finServiceDt'])) {

    if (strlen($_POST['cantDobletroque'])>=1) {
        $cedula = $_SESSION['username'];
        $cantidad = $_POST['cantDobletroque'];

        $busqueda = "SELECT id FROM `servicio` WHERE 'fecha_final'=null AND 'usuario_cedula'= '$cedulaG'";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);


        $updateServicio = "UPDATE `servicio` SET `cantidad_dobletroque` = '$cantidad', `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoBusqueda';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        if($resultadoUpdate){
            header('location: index-operario.php');
        }else{
            echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    }
}else{
    
}