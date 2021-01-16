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
        
            $horas ="SELECT TIMESTAMPDIFF(MINUTE, '$resultFinalFechas[0]', '$resultFinalFechas[1]') FROM servicio";
            $resultHoras = mysqli_query($conexion, $horas);
            $resultFinalHoras = mysqli_fetch_row($resultHoras);
        
            
            $resultadoFinalPro = $resultadoFinalPro + $resultFinalHoras[0];
        
            
        }

        $resultadoFinalPro=$resultadoFinalPro/60;
        $resultadoFinalPro=(double)$resultadoFinalPro;



        

        $consultaC1 = "SELECT SUM(cantidad_dobletroque), SUM(cantidad_tractomulas) FROM servicio WHERE cargador_id=1 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";

        $resultadoC1 = mysqli_query($conexion,$consultaC1);

        $finalC1 = mysqli_fetch_row($resultadoC1);

        $GLOBALS['cantDobletroque'] = $finalC1[0];
        $GLOBALS['cantTractomula'] = $finalC1[1];
        $GLOBALS['tiempoArrume'] = $resultadoFinalPro;
        $GLOBALS['tiempoMezcla'] = $resultadoFinalPro;

        $_SESSION['cantidaDT'] = $cantDobletroque;
        $_SESSION['cantidadTR'] = $cantTractomula;
        $_SESSION['tArrume'] = $tiempoArrume;
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
