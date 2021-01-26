<?php

include_once('con_db.php');

if (isset($_POST['generarInforme'])) {

    if (strlen($_POST['fechaInicial']) >= 1 && strlen($_POST['fechaFinal']) >= 1 && $_POST['opUsuario'] >= 1) {
        $usuario = $_POST['opUsuario'];
        $f1 = $_POST['fechaInicial'];
        $f2 = $_POST['fechaFinal'];

        $consultaP1 = "SELECT id FROM servicio WHERE operario_cedula='$usuario' AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result = mysqli_query($conexion, $consultaP1);

        $resultadoFinalPro = 0;

        while ($fila = mysqli_fetch_array($result)) {
            $filaPrueba = (int)$fila['id'];
            $fechas = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba;'";
            $resultFechas = mysqli_query($conexion, $fechas);
            $resultFinalFechas = mysqli_fetch_row($resultFechas);

            $horas = "SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas[0]', '$resultFinalFechas[1]') FROM servicio";
            $resultHoras = mysqli_query($conexion, $horas);
            $resultFinalHoras = mysqli_fetch_row($resultHoras);


            $resultadoFinalPro = $resultadoFinalPro + $resultFinalHoras[0];
        }

        $resultadoFinalPro = $resultadoFinalPro / 3600;
        $resultadoFinalPro = bcdiv($resultadoFinalPro, '1', 3);

        $consultaC1 = "SELECT SUM(cantidad_dobletroque), SUM(cantidad_tractomulas) FROM servicio WHERE operario_cedula='$usuario' AND cargador_id=1 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";

        $resultadoC1 = mysqli_query($conexion, $consultaC1);

        $finalC1 = mysqli_fetch_row($resultadoC1);

        $GLOBALS['cantDobletroque'] = $finalC1[0];
        $GLOBALS['cantTractomula'] = $finalC1[1];
        $GLOBALS['tiempoUsoFinal'] = $resultadoFinalPro;

        $_SESSION['cantidadDT'] = $cantDobletroque;
        $_SESSION['cantidadTR'] = $cantTractomula;
        $_SESSION['tUso'] = $tiempoUsoFinal;

        $consultaC2 = "SELECT SUM(cantidad_dobletroque), SUM(cantidad_tractomulas) FROM servicio WHERE operario_cedula='$usuario' AND cargador_id=2 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";

        $resultadoC2 = mysqli_query($conexion, $consultaC2);

        $finalC2 = mysqli_fetch_row($resultadoC2);

        $GLOBALS['cantDobletroque2'] = $finalC2[0];
        $GLOBALS['cantTractomula2'] = $finalC2[1];

        $_SESSION['cantidadDT2'] = $cantDobletroque2;
        $_SESSION['cantidadTR2'] = $cantTractomula2;

        //Tiempo Mezcla de carbón C1

        $consultaP17 = "SELECT id FROM servicio WHERE cargador_id=1 AND operario_cedula='$usuario' AND tipo_servicio_id = 4  AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result17 = mysqli_query($conexion, $consultaP17);

        $resultadoFinalPro17 = 0;

        while ($fila17 = mysqli_fetch_array($result17)) {
            $filaPrueba17 = (int)$fila17['id'];
            $fechas17 = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba17;'";
            $resultFechas17 = mysqli_query($conexion, $fechas17);
            $resultFinalFechas17 = mysqli_fetch_row($resultFechas17);

            $horas17 = "SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas17[0]', '$resultFinalFechas17[1]') FROM servicio";
            $resultHoras17 = mysqli_query($conexion, $horas17);
            $resultFinalHoras17 = mysqli_fetch_row($resultHoras17);


            $resultadoFinalPro17 = $resultadoFinalPro17 + $resultFinalHoras17[0];
        }

        $resultadoFinalPro17 = $resultadoFinalPro17 / 3600;
        $resultadoFinalPro17 = bcdiv($resultadoFinalPro17, '1', 3);

        $GLOBALS['tiempoMezcla'] = $resultadoFinalPro17;
        $_SESSION['tMezcla'] = $tiempoMezcla;


        //Tiempo Mezcla de carbón C2

        $consultaP18 = "SELECT id FROM servicio WHERE cargador_id=2 AND operario_cedula='$usuario' AND tipo_servicio_id = 4  AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result18 = mysqli_query($conexion, $consultaP18);

        $resultadoFinalPro18 = 0;

        while ($fila18 = mysqli_fetch_array($result18)) {
            $filaPrueba18 = (int)$fila18['id'];
            $fechas18 = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba18;'";
            $resultFechas18 = mysqli_query($conexion, $fechas18);
            $resultFinalFechas18 = mysqli_fetch_row($resultFechas18);

            $horas18 = "SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas18[0]', '$resultFinalFechas18[1]') FROM servicio";
            $resultHoras18 = mysqli_query($conexion, $horas18);
            $resultFinalHoras18 = mysqli_fetch_row($resultHoras18);


            $resultadoFinalPro18 = $resultadoFinalPro18 + $resultFinalHoras18[0];
        }

        $resultadoFinalPro18 = $resultadoFinalPro18 / 3600;
        $resultadoFinalPro18 = bcdiv($resultadoFinalPro18, '1', 3);

        $GLOBALS['tiempoMezcla2'] = $resultadoFinalPro18;
        $_SESSION['tMezcla2'] = $tiempoMezcla2;


        //Tiempo Arrume de carbón C1

        $consultaP16 = "SELECT id FROM servicio WHERE cargador_id=1 AND ususario_cedula='$usuario' AND tipo_servicio_id = 3  AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
        $result16 = mysqli_query($conexion, $consultaP16);

        $resultadoFinalPro16 = 0;

        while ($fila16 = mysqli_fetch_array($result16)) {
            $filaPrueba16 = (int)$fila16['id'];
            $fechas16 = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba16;'";
            $resultFechas16 = mysqli_query($conexion, $fechas16);
            $resultFinalFechas16 = mysqli_fetch_row($resultFechas16);

            $horas16 = "SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas16[0]', '$resultFinalFechas16[1]') FROM servicio";
            $resultHoras16 = mysqli_query($conexion, $horas16);
            $resultFinalHoras16 = mysqli_fetch_row($resultHoras16);


            $resultadoFinalPro16 = $resultadoFinalPro16 + $resultFinalHoras16[0];
        }

        $resultadoFinalPro16 = $resultadoFinalPro16 / 3600;
        $resultadoFinalPro16 = bcdiv($resultadoFinalPro16, '1', 3);

        $GLOBALS['tiempoArrume'] = $resultadoFinalPro16;
        $_SESSION['tArrume'] = $tiempoArrume;


                //Tiempo Arrume de carbón C1

                $consultaP19 = "SELECT id FROM servicio WHERE cargador_id=2 AND ususario_cedula='$usuario' AND tipo_servicio_id = 3  AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";
                $result19 = mysqli_query($conexion, $consultaP19);
        
                $resultadoFinalPro19 = 0;
        
                while ($fila19 = mysqli_fetch_array($result19)) {
                    $filaPrueba19 = (int)$fila19['id'];
                    $fechas19 = "SELECT fecha_inicial, fecha_final  FROM servicio WHERE id='$filaPrueba19;'";
                    $resultFechas19 = mysqli_query($conexion, $fechas19);
                    $resultFinalFechas19 = mysqli_fetch_row($resultFechas19);
        
                    $horas19 = "SELECT TIMESTAMPDIFF(SECOND, '$resultFinalFechas19[0]', '$resultFinalFechas19[1]') FROM servicio";
                    $resultHoras19 = mysqli_query($conexion, $horas19);
                    $resultFinalHoras19 = mysqli_fetch_row($resultHoras19);
        
        
                    $resultadoFinalPro19 = $resultadoFinalPro19 + $resultFinalHoras19[0];
                }
        
                $resultadoFinalPro19 = $resultadoFinalPro19 / 3600;
                $resultadoFinalPro19 = bcdiv($resultadoFinalPro19, '1', 3);
        
                $GLOBALS['tiempoArrume2'] = $resultadoFinalPro19;
                $_SESSION['tArrume2'] = $tiempoArrume2;

        if ($resultadoC1) {
            header('location: informe-usuario.php');
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo' . $usuario . '");
            window.location.href="#";
            </script>
            ';
        } else {
            echo '<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    }
}
