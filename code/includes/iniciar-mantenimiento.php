<?php

include_once('con_db.php');
include_once('global.php');

if (isset($_POST['iniciarMantenimiento'])) {

    if (strlen($_POST['opMantenimiento'])>=1 && isset($_POST['cargador'])>=1) {
        $mantenimiento = $_POST['opMantenimiento'];
        $GLOBALS['cargador'] = $_POST['cargador'];
        $_SESSION['cargadorEstado'] = $cargador;

        $insertMantenimiento = "INSERT INTO `mantenimiento`(`fecha_inicial`, `tipo_mantenimiento_id`, `usuario_cedula`, `cargador_id`) VALUES (NOW(),'$mantenimiento', '$cedulaG', '$cargador') ";
        $resultadoInsert = mysqli_query($conexion, $insertMantenimiento);

        if($resultadoInsert){
                    $updateEstado = "UPDATE `cargador` SET `estado` = '0' WHERE `cargador`.`id` = '$cargador'";
                    $updateResultado = mysqli_query($conexion, $updateEstado);
         
                    header('location: fin-mantenimiento.php');
            
        }else{
            echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="mantenimiento.php";
            </script>
            ';
        }
    }
}else{
    
}
