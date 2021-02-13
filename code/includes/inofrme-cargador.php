<?php

include_once('con_db.php');


if (isset($_POST['generarInforme'])) {

    if (strlen($_POST['fechaInicial']) >= 1 && strlen($_POST['fechaFinal']) >= 1) {
        $f1 = $_POST['fechaInicial'];
        $f2 = $_POST['fechaFinal'];

        //mientras sea difrnte d null

        $consultaP1= "SELECT id FROM servicio WHERE cargador_id=1 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result = mysqli_query($conexion, $consultaP1);
        
        $resultadoFinalPro =0;
        
        while($fila= mysqli_fetch_array($result)){
            $filaPrueba = (int)$fila['id'];
            $fechas = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba;'"; 
            $resultFechas = mysqli_query($conexion, $fechas);
            $resultFinalFechas = mysqli_fetch_row($resultFechas);
        
            $horas ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas[0]', '$resultFinalFechas[1]') FROM servicio";
            $resultHoras = mysqli_query($conexion, $horas);
            $resultFinalHoras = mysqli_fetch_row($resultHoras);
        
            
            $resultadoFinalPro = $resultadoFinalPro + $resultFinalHoras[0];
        
            
        }

        $resultadoFinalPro=$resultadoFinalPro/3600;
        $resultadoFinalPro= bcdiv($resultadoFinalPro, '1', 3);

        $consultaC1 = "SELECT SUM(cantidad_dobletroque), SUM(cantidad_tractomulas), SUM(cuatro_manos) FROM servicio WHERE cargador_id=1 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";

        $resultadoC1 = mysqli_query($conexion,$consultaC1);

        $finalC1 = mysqli_fetch_row($resultadoC1);

        $GLOBALS['cantDobletroque'] = $finalC1[0];
        $GLOBALS['cantTractomula'] = $finalC1[1];
        $GLOBALS['cantCuatroManos'] = $finalC1[2];
        $GLOBALS['tiempoUsoFinal'] = $resultadoFinalPro;

        $_SESSION['cantidaDT'] = $cantDobletroque;
        $_SESSION['cantidadTR'] = $cantTractomula;
        $_SESSION['cantidadCM'] = $cantCuatroManos;
        $_SESSION['tUso'] = $tiempoUsoFinal;
     

        //Tiempo combustible

        $consultaP2= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 1 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result2 = mysqli_query($conexion, $consultaP2);
        
        $resultadoFinalPro2 =0;
        
        while($fila2= mysqli_fetch_array($result2)){
            $filaPrueba2 = (int)$fila2['id'];
            $fechas2 = "SELECT fecha_inicial, fecha_final  FROM mantenimiento WHERE id='$filaPrueba2;'"; 
            $resultFechas2 = mysqli_query($conexion, $fechas2);
            $resultFinalFechas2 = mysqli_fetch_row($resultFechas2);
        
            $horas2 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas2[0]', '$resultFinalFechas2[1]') FROM mantenimiento";
            $resultHoras2 = mysqli_query($conexion, $horas2);
            $resultFinalHoras2 = mysqli_fetch_row($resultHoras2);
        
            
            $resultadoFinalPro2 = $resultadoFinalPro2 + $resultFinalHoras2[0];
        
            
        }

        $resultadoFinalPro2=$resultadoFinalPro2/3600;
        $resultadoFinalPro2= bcdiv($resultadoFinalPro2, '1', 3);

        $GLOBALS['tiempoCombustible'] = $resultadoFinalPro2;
        $_SESSION['tCombustible'] = $tiempoCombustible;

        //Tiempo Aceite y filtros

        $consultaP3= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 2 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result3 = mysqli_query($conexion, $consultaP3);
        
        $resultadoFinalPro3 =0;
        
        while($fila3= mysqli_fetch_array($result3)){
            $filaPrueba3 = (int)$fila3['id'];
            $fechas3 = "SELECT fecha_inicial, fecha_final  FROM mantenimiento WHERE id='$filaPrueba3;'"; 
            $resultFechas3 = mysqli_query($conexion, $fechas3);
            $resultFinalFechas3 = mysqli_fetch_row($resultFechas3);
        
            $horas3 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas3[0]', '$resultFinalFechas3[1]') FROM mantenimiento";
            $resultHoras3 = mysqli_query($conexion, $horas3);
            $resultFinalHoras3 = mysqli_fetch_row($resultHoras3);
        
            
            $resultadoFinalPro3 = $resultadoFinalPro3 + $resultFinalHoras3[0];
        
            
        }

        $resultadoFinalPro3=$resultadoFinalPro3/3600;
        $resultadoFinalPro3= bcdiv($resultadoFinalPro3, '1', 3);

        $GLOBALS['tiempoAceite'] = $resultadoFinalPro3;
        $_SESSION['tAceite'] = $tiempoAceite;

        //Tiempo Engrase general

        $consultaP4= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 3 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result4 = mysqli_query($conexion, $consultaP4);
        
        $resultadoFinalPro4 =0;
        
        while($fila4= mysqli_fetch_array($result4)){
            $filaPrueba4 = (int)$fila4['id'];
            $fechas4 = "SELECT fecha_inicial, fecha_final  FROM mantenimiento WHERE id='$filaPrueba4;'"; 
            $resultFechas4 = mysqli_query($conexion, $fechas4);
            $resultFinalFechas4 = mysqli_fetch_row($resultFechas4);
        
            $horas4 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas4[0]', '$resultFinalFechas4[1]') FROM mantenimiento";
            $resultHoras4 = mysqli_query($conexion, $horas4);
            $resultFinalHoras4 = mysqli_fetch_row($resultHoras4);
        
            
            $resultadoFinalPro4 = $resultadoFinalPro4 + $resultFinalHoras4[0];
        
            
        }

        $resultadoFinalPro4=$resultadoFinalPro4/3600;
        $resultadoFinalPro4= bcdiv($resultadoFinalPro4, '1', 3);

        $GLOBALS['tiempoEngrase'] = $resultadoFinalPro4;
        $_SESSION['tEngrase'] = $tiempoEngrase;

        //Tiempo Cambio de llantas

        $consultaP5= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 4 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result5 = mysqli_query($conexion, $consultaP5);
        
        $resultadoFinalPro5 =0;
        
        while($fila5= mysqli_fetch_array($result5)){
            $filaPrueba5 = (int)$fila5['id'];
            $fechas5 = "SELECT fecha_inicial, fecha_final  FROM mantenimiento WHERE id='$filaPrueba5;'"; 
            $resultFechas5 = mysqli_query($conexion, $fechas5);
            $resultFinalFechas5 = mysqli_fetch_row($resultFechas5);
        
            $horas5 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas5[0]', '$resultFinalFechas5[1]') FROM mantenimiento";
            $resultHoras5 = mysqli_query($conexion, $horas5);
            $resultFinalHoras5 = mysqli_fetch_row($resultHoras5);
        
            
            $resultadoFinalPro5 = $resultadoFinalPro5 + $resultFinalHoras5[0];
        
            
        }

        $resultadoFinalPro5=$resultadoFinalPro5/3600;
        $resultadoFinalPro5= bcdiv($resultadoFinalPro5, '1', 3);

        $GLOBALS['tiempoLlantas'] = $resultadoFinalPro5;
        $_SESSION['tLlantas'] = $tiempoLlantas;

        //Tiempo Manteniminto Eléctrico

        $consultaP6= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 5 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result6 = mysqli_query($conexion, $consultaP6);
        
        $resultadoFinalPro6 =0;
        
        while($fila6= mysqli_fetch_array($result6)){
            $filaPrueba6 = (int)$fila6['id'];
            $fechas6 = "SELECT fecha_inicial, fecha_final  FROM mantenimiento WHERE id='$filaPrueba6;'"; 
            $resultFechas6 = mysqli_query($conexion, $fechas6);
            $resultFinalFechas6 = mysqli_fetch_row($resultFechas6);
        
            $horas6 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas6[0]', '$resultFinalFechas6[1]') FROM mantenimiento";
            $resultHoras6 = mysqli_query($conexion, $horas6);
            $resultFinalHoras6 = mysqli_fetch_row($resultHoras6);
        
            
            $resultadoFinalPro6 = $resultadoFinalPro6 + $resultFinalHoras6[0];
        
            
        }

        $resultadoFinalPro6=$resultadoFinalPro6/3600;
        $resultadoFinalPro6= bcdiv($resultadoFinalPro6, '1', 3);

        $GLOBALS['tiempoMelectrico'] = $resultadoFinalPro6;
        $_SESSION['tMelectrico'] = $tiempoMelectrico;

        //Tiempo Manteniminto Mecánico

        $consultaP7= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 6 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result7 = mysqli_query($conexion, $consultaP7);
        
        $resultadoFinalPro7 =0;
        
        while($fila7= mysqli_fetch_array($result7)){
            $filaPrueba7 = (int)$fila7['id'];
            $fechas7 = "SELECT fecha_inicial, fecha_final  FROM mantenimiento WHERE id='$filaPrueba7;'"; 
            $resultFechas7 = mysqli_query($conexion, $fechas7);
            $resultFinalFechas7 = mysqli_fetch_row($resultFechas7);
        
            $horas7 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas7[0]', '$resultFinalFechas7[1]') FROM mantenimiento";
            $resultHoras7 = mysqli_query($conexion, $horas7);
            $resultFinalHoras7 = mysqli_fetch_row($resultHoras7);
        
            
            $resultadoFinalPro7 = $resultadoFinalPro7 + $resultFinalHoras7[0];
        
            
        }

        $resultadoFinalPro7=$resultadoFinalPro7/3600;
        $resultadoFinalPro7= bcdiv($resultadoFinalPro7, '1', 3);

        $GLOBALS['tiempoMmecanico'] = $resultadoFinalPro7;
        $_SESSION['tMmecanico'] = $tiempoMmecanico;

        //Tiempo Lavado general

        $consultaP8= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 7 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result8 = mysqli_query($conexion, $consultaP8);
        
        $resultadoFinalPro8 =0;
        
        while($fila8= mysqli_fetch_array($result8)){
            $filaPrueba8 = (int)$fila8['id'];
            $fechas8 = "SELECT fecha_inicial, fecha_final  FROM mantenimiento WHERE id='$filaPrueba8;'"; 
            $resultFechas8 = mysqli_query($conexion, $fechas8);
            $resultFinalFechas8 = mysqli_fetch_row($resultFechas8);
        
            $horas8 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas8[0]', '$resultFinalFechas8[1]') FROM mantenimiento";
            $resultHoras8 = mysqli_query($conexion, $horas8);
            $resultFinalHoras8 = mysqli_fetch_row($resultHoras8);
        
            
            $resultadoFinalPro8 = $resultadoFinalPro8 + $resultFinalHoras8[0];
        
            
        }

        $resultadoFinalPro8=$resultadoFinalPro8/3600;
        $resultadoFinalPro8= bcdiv($resultadoFinalPro8, '1', 3);

        $GLOBALS['tiempoLavado'] = $resultadoFinalPro8;
        $_SESSION['tLavado'] = $tiempoLavado;

        //Costo Combustible

        $consultaP9= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 1 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result9 = mysqli_query($conexion, $consultaP9);
        
        $resultadoFinalPro9 =0;
        
        while($fila9= mysqli_fetch_array($result9)){
            $filaPrueba9 = (int)$fila9['id'];
            $costo9 = "SELECT costo  FROM mantenimiento WHERE id='$filaPrueba9;'"; 
            $resultCosto9 = mysqli_query($conexion, $costo9);
            $resultFinalCosto9 = mysqli_fetch_row($resultCosto9);
            
            $resultadoFinalPro9 = $resultadoFinalPro9 + $resultFinalCosto9[0];
        
            
        }

        $GLOBALS['costoCombustible'] = $resultadoFinalPro9;
        $_SESSION['cCombustible'] = $costoCombustible;

        //Costo Aceite y filtros

        $consultaP10= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 2 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result10 = mysqli_query($conexion, $consultaP10);
        
        $resultadoFinalPro10 =0;
        
        while($fila10= mysqli_fetch_array($result10)){
            $filaPrueba10 = (int)$fila10['id'];
            $costo10 = "SELECT costo  FROM mantenimiento WHERE id='$filaPrueba10;'"; 
            $resultCosto10 = mysqli_query($conexion, $costo10);
            $resultFinalCosto10 = mysqli_fetch_row($resultCosto10);
            
            $resultadoFinalPro10 = $resultadoFinalPro10 + $resultFinalCosto10[0];
        
            
        }

        $GLOBALS['costoAceite'] = $resultadoFinalPro10;
        $_SESSION['cAceite'] = $costoAceite;

        //Costo Engrase General

        $consultaP11= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 3 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result11 = mysqli_query($conexion, $consultaP11);
        
        $resultadoFinalPro11 =0;
        
        while($fila11= mysqli_fetch_array($result11)){
            $filaPrueba11 = (int)$fila11['id'];
            $costo11 = "SELECT costo  FROM mantenimiento WHERE id='$filaPrueba11;'"; 
            $resultCosto11 = mysqli_query($conexion, $costo11);
            $resultFinalCosto11 = mysqli_fetch_row($resultCosto11);
            
            $resultadoFinalPro11 = $resultadoFinalPro11 + $resultFinalCosto11[0];
        
            
        }

        $GLOBALS['costoEngrase'] = $resultadoFinalPro11;
        $_SESSION['cEngrase'] = $costoEngrase;

        //Costo Cambio de llantas

        $consultaP12= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 4 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result12 = mysqli_query($conexion, $consultaP12);
        
        $resultadoFinalPro12 =0;
        
        while($fila12= mysqli_fetch_array($result12)){
            $filaPrueba12 = (int)$fila12['id'];
            $costo12 = "SELECT costo  FROM mantenimiento WHERE id='$filaPrueba12;'"; 
            $resultCosto12 = mysqli_query($conexion, $costo12);
            $resultFinalCosto12 = mysqli_fetch_row($resultCosto12);
            
            $resultadoFinalPro12 = $resultadoFinalPro12 + $resultFinalCosto12[0];
        
            
        }

        $GLOBALS['costoLlantas'] = $resultadoFinalPro12;
        $_SESSION['cLlantas'] = $costoLlantas;

        //Costo Mantenimiento Eléctrico

        $consultaP13= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 5 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result13 = mysqli_query($conexion, $consultaP13);
        
        $resultadoFinalPro13 =0;
        
        while($fila13= mysqli_fetch_array($result13)){
            $filaPrueba13 = (int)$fila13['id'];
            $costo13 = "SELECT costo  FROM mantenimiento WHERE id='$filaPrueba13;'"; 
            $resultCosto13 = mysqli_query($conexion, $costo13);
            $resultFinalCosto13 = mysqli_fetch_row($resultCosto13);
            
            $resultadoFinalPro13 = $resultadoFinalPro13 + $resultFinalCosto13[0];
        
            
        }

        $GLOBALS['costoMelectrico'] = $resultadoFinalPro13;
        $_SESSION['cMelectrico'] = $costoMelectrico;

        //Costo Mantenimiento Mecánico

        $consultaP14= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 6 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result14 = mysqli_query($conexion, $consultaP14);
        
        $resultadoFinalPro14 =0;
        
        while($fila14= mysqli_fetch_array($result14)){
            $filaPrueba14 = (int)$fila14['id'];
            $costo14 = "SELECT costo  FROM mantenimiento WHERE id='$filaPrueba14;'"; 
            $resultCosto14 = mysqli_query($conexion, $costo14);
            $resultFinalCosto14 = mysqli_fetch_row($resultCosto14);
            
            $resultadoFinalPro14 = $resultadoFinalPro14 + $resultFinalCosto14[0];
        
            
        }

        $GLOBALS['costoMmecanico'] = $resultadoFinalPro14;
        $_SESSION['cMmecanico'] = $costoMmecanico;

        //Costo Lavado General

        $consultaP15= "SELECT id FROM mantenimiento WHERE cargador_id=1 AND tipo_mantenimiento_id = 7 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result15 = mysqli_query($conexion, $consultaP15);
        
        $resultadoFinalPro15 =0;
        
        while($fila15= mysqli_fetch_array($result15)){
            $filaPrueba15 = (int)$fila15['id'];
            $costo15 = "SELECT costo  FROM mantenimiento WHERE id='$filaPrueba15;'"; 
            $resultCosto15 = mysqli_query($conexion, $costo15);
            $resultFinalCosto15 = mysqli_fetch_row($resultCosto15);
            
            $resultadoFinalPro15 = $resultadoFinalPro15 + $resultFinalCosto15[0];
        
            
        }

        $GLOBALS['costoLavado'] = $resultadoFinalPro15;
        $_SESSION['cLavado'] = $costoLavado;

        //Tiempo Arrume de carbón

        $consultaP16= "SELECT id FROM servicio WHERE cargador_id=1 AND tipo_servicio_id = 3  AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result16 = mysqli_query($conexion, $consultaP16);
        
        $resultadoFinalPro16 =0;
        
        while($fila16= mysqli_fetch_array($result16)){
            $filaPrueba16 = (int)$fila16['id'];
            $fechas16 = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba16;'"; 
            $resultFechas16 = mysqli_query($conexion, $fechas16);
            $resultFinalFechas16 = mysqli_fetch_row($resultFechas16);
        
            $horas16 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas16[0]', '$resultFinalFechas16[1]') FROM servicio";
            $resultHoras16 = mysqli_query($conexion, $horas16);
            $resultFinalHoras16 = mysqli_fetch_row($resultHoras16);
        
            
            $resultadoFinalPro16 = $resultadoFinalPro16 + $resultFinalHoras16[0];
        
            
        }

        $resultadoFinalPro16=$resultadoFinalPro16/3600;
        $resultadoFinalPro16= bcdiv($resultadoFinalPro16, '1', 3);

        $GLOBALS['tiempoArrume'] = $resultadoFinalPro16;
        $_SESSION['tArrume'] = $tiempoArrume;

        //Tiempo Mezcla de carbón

        $consultaP17= "SELECT id FROM servicio WHERE cargador_id=1 AND tipo_servicio_id = 4  AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result17 = mysqli_query($conexion, $consultaP17);
        
        $resultadoFinalPro17 =0;
        
        while($fila17= mysqli_fetch_array($result17)){
            $filaPrueba17 = (int)$fila17['id'];
            $fechas17 = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba17;'"; 
            $resultFechas17 = mysqli_query($conexion, $fechas17);
            $resultFinalFechas17 = mysqli_fetch_row($resultFechas17);
        
            $horas17 ="SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas17[0]', '$resultFinalFechas17[1]') FROM servicio";
            $resultHoras17 = mysqli_query($conexion, $horas17);
            $resultFinalHoras17 = mysqli_fetch_row($resultHoras17);
        
            
            $resultadoFinalPro17 = $resultadoFinalPro17 + $resultFinalHoras17[0];
        
            
        }

        $resultadoFinalPro17=$resultadoFinalPro17/3600;
        $resultadoFinalPro17= bcdiv($resultadoFinalPro17, '1', 3);

        $GLOBALS['tiempoMezcla'] = $resultadoFinalPro17;
        $_SESSION['tMezcla'] = $tiempoMezcla;

        if($resultadoC1){
            header('location: informe-cargador1.php');
        }else{
            echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }


    }
}
