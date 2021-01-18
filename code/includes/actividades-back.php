<?php 

//session_start();

if (!isset($_SESSION['rol'])) {
    header("Location:./");
}

if (isset($_SESSION['rol']) ) {
    $clave_ses = $_SESSION['rol'];

    include_once("con_db.php");

    $consultaPrevia="SELECT COUNT(actividad_id) FROM `actividad_rol` WHERE rol_id =$clave_ses";
    $resultadoPrevio =mysqli_query($conexion,$consultaPrevia);
    $resultadoPrevio2 = mysqli_fetch_row($resultadoPrevio);
    $numero=(int)$resultadoPrevio2[0];

    $consulta = "SELECT actividad.nombre AS actividad, actividad.id AS idAct, actividad.url AS enlace FROM actividad,rol,actividad_rol WHERE actividad_rol.rol_id = rol.id AND actividad_rol.actividad_id = actividad.id AND rol.id = '$clave_ses' ORDER BY actividad.id";

    $resultado = mysqli_query($conexion, $consulta);

   /* while ($mostrar = mysqli_fetch_array($resultado)) {
    }*/
}

?>