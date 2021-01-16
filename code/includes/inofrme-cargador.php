<?php

include_once('con_db.php');


if (isset($_POST['generarInforme'])) {

    if (strlen($_POST['fechaInicial']) >= 1 && strlen($_POST['fechaFinal']) >= 1) {
        $f1 = $_POST['fechaInicial'];
        $f2 = $_POST['fechaFinal'];

        $consultaC1 = "SELECT SUM(cantidad_dobletroque), SUM(cantidad_tractomulas), TIMESTAMPDIFF(HOUR, '$f1', '$f2') FROM servicio WHERE cargador_id=1 AND fecha_inicial >= '$f1' AND fecha_final < DATE_ADD('$f2', INTERVAL 1 DAY)";

        $resultadoC1 = mysqli_query($conexion,$consultaC1);

        $finalC1 = mysqli_fetch_row($resultadoC1);

        $GLOBALS['cantDobletroque'] = $finalC1[0];
        $GLOBALS['cantTractomula'] = $finalC1[1];
        $GLOBALS['tiempoArrume'] = $finalC1[2];
        $GLOBALS['tiempoMezcla'] = $finalC1[2];

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
