<?php

include_once('con_db.php');
include_once('global.php');

$busquedaServicio = "SELECT id FROM servicio WHERE fecha_final IS NULL AND operario_cedula= '$cedulaG'";
        $resultadoBusquedaServicio = mysqli_query($conexion, $busquedaServicio);
        $resultadoFinalBusquedaS = mysqli_fetch_row($resultadoBusquedaServicio);

        if($resultadoFinalBusquedaS[0]>=1){
            header('location: mas-servicio-validacion.php');
        }else{
            header('location: nuevo-servicio.php');
        }

