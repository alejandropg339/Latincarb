<?php

include_once('con_db.php');


if (isset($_POST['inicia'])) {

    if (strlen($_POST['opUsuario'])>=1 && strlen($_POST['opServicio'])>=1 && isset($_POST['cargador'])>=1) {
        $cedulaUsuario = $_POST['opUsuario'];
        $servicio = $_POST['opServicio'];
        $cargador = $_POST['cargador'];

        $insertServicio = "INSERT INTO `servicio`(`fecha_inicial`, `usuario_cedula`, `tipo_servicio_id`, `cargador_id`) VALUES (NOW(),'$cedulaUsuario','$servicio','$cargador')";
        $resultadoInsert = mysqli_query($conexion, $insertServicio);

        if($resultadoInsert){
            switch ($servicio) {
                case 1:
                    header('location: servicio-dt.php');
                    break;
                case 2:
                    header('location: servicio-tr.php');
                    break;
                case 3:
                    header('location: servicio-arc.php');
                    break;
                case 4:
                    header('location: servicio-mzc.php');
                    break;
                case 5:
                     header('location: mas-servicio.php');
                     break;
    
                default:
                    header('location:index-d.php');
            }
        }else{
            echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="nuevo-servicio.php";
            </script>
            ';
        }
    }
}else{
    
}