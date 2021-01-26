<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}
include_once('includes/usuarios.php');
include_once('includes/informe-cargador-dos.php');
include_once('includes/global4.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="images/ensayo.png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Informes</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="backButton">
                <a class="img-backButton" href="index-admin.php"><img src="images/back_button.png" alt=""></a>
            </div>
            <div class="header-logo">
                <img src="images/LOGO2.jpg" alt="latincarb">
            </div>
            <div class="header-bievenida">
                <h1>Informe Cargador 2</h1>
                <h3>Informe de Servicios</h3>
                <p><?php echo "El tiempo total de uso es: ".$tUsoF." Horas"?></p>
            </div>
        </div>

        <div class="flex-container-informe">
            <table class="table table-bordered table-responsive-sm">

                <tr class="table-success">

                    <th class="celdaSup">Servicio</td>
                    <th class="celdaSup">Información</td>

                </tr>

                <tr>

                    <td>Total de Dobletroques </td>
                    <td><?php echo $cantDTF?></td>

                </tr>

                <tr>

                    <td>Total de tractomulas</td>
                    <td><?php echo $cantTRF?></td>

                </tr>

                <tr>

                    <td>Tiempo arrume de carbón</td>
                    <td><?php echo $tArrumeF." Horas"?></td>

                </tr>

                <tr>

                    <td>Tiempo mezcla de carbón</td>
                    <td><?php echo $tMezclaF." Horas"?></td>

                </tr>

            </table>

        </div>

        <div class="header">
            <h3>Informe de Servicios</h3>
        </div>

        <div class="flex-container-informe">
            <table class="table table-bordered table-responsive-sm">

                <tr class="table-success">

                    <th class="celdaSup">Mantenimiento</td>
                    <th class="celdaSup">Tiempo</td>
                    <th class="celdaSup">Costo</td>

                </tr>

                <tr>

                    <td>Combustible</td>
                    <td><?php echo $tCombustibleF." Horas"?></td>
                    <td><?php echo "$".$cCombustibleF?></td>

                </tr>

                <tr>

                    <td>Aceite y filtros</td>
                    <td><?php echo $tAceiteF." Horas"?></td>
                    <td><?php echo "$".$cAceiteF?></td>

                </tr>

                <tr>

                    <td>Engrase general</td>
                    <td><?php echo $tEngraseF." Horas"?></td>
                    <td><?php echo "$".$cEngraseF?></td>
                </tr>

                <tr>

                    <td>Cambio de llantas</td>
                    <td><?php echo $tLlantasF." Horas"?></td>
                    <td><?php echo "$".$cLlantasF?></td>

                </tr>

                <tr>

                    <td>M. Eléctrico</td>
                    <td><?php echo $tMelectricoF." Horas"?></td>
                    <td><?php echo "$".$cMelectricoF?></td>

                </tr>

                <tr>

                    <td>M. Mecánico</td>
                    <td><?php echo $tMmecanicoF." Horas"?></td>
                    <td><?php echo "$".$cMmecanicoF?></td>

                </tr>

                <tr>

                    <td>Lavado Genéral</td>
                    <td><?php echo $tLavadoF." Horas"?></td>
                    <td><?php echo "$".$cLavadoF?></td>

                </tr>

            </table>


        </div>

        <br>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>