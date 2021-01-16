<?php

include_once('includes/con_db.php');


$consultaP1= "SELECT id FROM servicio WHERE cargador_id=1 AND fecha_inicial >= '2021-01-11' AND fecha_final < DATE_ADD('2021-01-14', INTERVAL 1 DAY)";
$result = mysqli_query($conexion, $consultaP1);

$resultadoFinalPro =0;

while($fila= mysqli_fetch_array($result)){
    $filaPrueba = (int)$fila['id'];
    $fechas = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba;'"; 
    $resultFechas = mysqli_query($conexion, $fechas);
    $resultFinalFechas = mysqli_fetch_row($resultFechas);

    $horas ="SELECT TIMESTAMPDIFF(MINUTE, '$resultFinalFechas[0]', '$resultFinalFechas[1]') FROM servicio";
    $resultHoras = mysqli_query($conexion, $horas);
    $resultFinalHoras = mysqli_fetch_row($resultHoras);

    echo " -----------------".$resultFinalHoras[0];
    
    $resultadoFinalPro = $resultadoFinalPro + $resultFinalHoras[0];

    echo "RESULTADOOOO -----------------".$resultadoFinalPro;
    
}