<?php

include_once('con_db.php');
include_once('global.php');

$busqueda2 = "SELECT fecha_inicial, cargador_id FROM servicio WHERE fecha_final IS NULL AND operario_cedula= '$cedulaG'";
$resultadoBusqueda2 = mysqli_query($conexion, $busqueda2);
$resultadoFechaInicial = mysqli_fetch_row($resultadoBusqueda2);
$resultadoFinalBusqueda2="";
$resultadoFinalBusqueda3="";
if($resultadoFechaInicial==null){
    echo "";
}else{
    $resultadoFinalBusqueda2 = $resultadoFechaInicial[0];
    $resultadoFinalBusqueda3 = $resultadoFechaInicial[1];
}

if (isset($_POST['inicia'])) {
    if ($resultadoFechaInicial == null) {
            
        if (strlen($_POST['opUsuario']) >= 1 && strlen($_POST['opServicio']) >= 1 && isset($_POST['cargador']) >= 1) {
            $GLOBALS['cedulaUsuario'] = $_POST['opUsuario'];
            $servicio = $_POST['opServicio'];
            $GLOBALS['cargador'] = $_POST['cargador'];
            $_SESSION['userService'] = $cedulaUsuario;
            $_SESSION['cargadorEstado'] = $cargador;
            //$_SESSION['userService']=$cedulaUsuario;

            $insertServicio = "INSERT INTO `servicio`(`fecha_inicial`, `usuario_cedula`,`operario_cedula`, `tipo_servicio_id`, `cargador_id`) VALUES ((NOW() - INTERVAL 5 HOUR),'$cedulaUsuario','$cedulaG','$servicio','$cargador')";
            $resultadoInsert = mysqli_query($conexion, $insertServicio);

            if ($resultadoInsert) {
                $updateEstado = "UPDATE `cargador` SET `estado` = '0' WHERE `cargador`.`id` = '$cargador'";
                $updateResultado = mysqli_query($conexion, $updateEstado);
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
                    case 6:
                        header('location: servicio-cm.php');
                         break;

                    default:
                        header('location:index.php');
                }
            } else {
                echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="nuevo-servicio.php";
            </script>
            ';
            }
        }else{
            echo '<script type="text/javascript">
            alert("Por favor seleccione todas las opciones para empezar.");
            window.location.href="nuevo-servicio.php";
            </script>
            ';
        }
    }else{
        header('location: mas-servicio-validacion.php');
    }
}