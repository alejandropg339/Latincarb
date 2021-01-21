<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 4 && $_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}

include_once('includes/informe-admin-usuario.php');
include_once('includes/global5.php');
include_once('includes/usuarios.php');
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
            <a class="img-backButton" href="index.php"><img src="images/back_button.png" alt=""></a>
        </div>
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida">
            <h1>Usuario</h1>

        </div>
    </div>


    <div class="header">
        <h3>Informe de Servicios</h3>
        <p style="text-align: center;">El usuario utilizo durante <?php echo" ".$tUsoF." horas los servicios"?></p>
    </div>

    <div class="">


        <table class="table table-bordered table-responsive-sm ">

            <tr class="table-success">

                <th>Cargador</th>
                <th>Servicio</th>
                <th>Cantidad / tiempo</th>  

            </tr>

            <tr>

                <td>Cargador 1</td>
                <td>Total Dobletroques</td>
                <td><?php echo" ".$cantDTF; ?></td>

            </tr>

            <tr>

                <td>Cargador 1</td>
                <td>Total tractomulas</td>
                <td><?php echo" ".$cantTRF; ?></td>

            </tr>

            <tr>

                <td>Cargador 1</td>
                <td>Tiempo arrume de carbón</td>
                <td><?php echo" ".$tArrumeF; ?></td>
            </tr>

            <tr>

                <td>Cargador 1</td>
                <td>Tiempo mezcla de carbón</td>
                <td><?php echo" ".$tMezclaF; ?></td>

            </tr>

            <tr>

                <td>Cargador 2</td>
                <td>Total Dobletroques</td>
                <td><?php echo" ".$cantDTF2; ?></td>

            </tr>

            <tr>

                <td>Cargador 2</td>
                <td>Total tractomulas</td>
                <td><?php echo" ".$cantTRF2; ?></td>

            </tr>

            <tr>

                <td>Cargador 2</td>
                <td>Tiempo arrume de carbón</td>
                <td><?php echo" ".$tArrumeF2; ?></td>

            </tr>
            <tr>

                <td>Cargador 2</td>
                <td>Tiempo mezcla de carbón</td>
                <td><?php echo" ".$tMezclaF2; ?></td>

            </tr>

        </table>
    </div>



    <br>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</div>
</body>

</html>