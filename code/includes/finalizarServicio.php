<?php
include_once('con_db.php');
include_once('global.php');
include_once('servicio.php');

if (isset($_POST['finServiceDt'])) {

    echo'<script type="text/javascript">
    alert("Algo Salio mal por favor intentelo de nuevo");
    window.location.href="#";
    </script>
    ';

    if (strlen($_POST['cantDobletroque'])>=1) {
        $cedula = $_SESSION['username'];
        $cantidad = $_POST['cantDobletroque'];

        $busqueda = "SELECT id FROM servicio WHERE fecha_final IS NULL AND usuario_cedula= $cedulaUsuario";
        $resultadoBusqueda = mysqli_query($conexion, $busqueda);

        echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo'.  $resultadoBusqueda.' ");
            window.location.href="#";
            </script>
            ';


        $updateServicio = "UPDATE `servicio` SET `cantidad_dobletroque` = '$cantidad', `fecha_final` = NOW() WHERE `servicio`.`id` = '$resultadoBusqueda';";
        $resultadoUpdate = mysqli_query($conexion, $updateServicio);

        echo "".$resultadoUpdate;

        if($resultadoUpdate){
            header('location: index-operario.php');
        }else{
            echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    }
}else{
    echo'<script type="text/javascript">
            alert("Algo Salio mal por favor intentelo de nuevo");
            window.location.href="#";
            </script>
            ';
}