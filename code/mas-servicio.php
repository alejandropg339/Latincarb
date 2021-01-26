<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 3 && $_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}
include_once('includes/finalizarServicioMas.php');

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
    <title>Mas de Un Servicio</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-logo-servicio">
                <img src="images/LOGO2.jpg" alt="latincarb">
            </div>
            <div class="header-bievenida-servicio">
                <h1>Nuevo Servicio</h1>
            </div>
        </div>
        <div class="article">
            <p class="article-service-ms" style="text-align: center;">Servicio iniciado a las: <br> <?php echo " ".$resultadoFinalBusqueda2 ?></p>
            <p class="article-service-ms mx-lg-5">Digite la cantidad de dobletroques cargados</p>
            <div class="container-selectors-ns">
                <form method="POST">
                    <!--<div class="container-selectors">-->
                    <input class="article-input" type="number" name="cantDobletroque"
                        placeholder="Cantidad de dobletroque">
            </div>
            <p class="article-service-ms mx-lg-5">Digite la cantidad tractomulas cargadas</p>
            <div class="container-selectors-ns">
                <input class="article-input" type="number" name="cantTractomula" placeholder="Cantidad de tractomulas">
            </div>
            <p class="article-service-ms mx-lg-5">Seleccione si realizo al menos uno de estos dos servicios</p>
            <br>
            <div class="flex-container">
                <div class="flex-name form-check">
                    <input class="form-check-input" type="checkbox" name="servicio" value="1" id="ac">
                    <label for="ac" class="form-check-label">Arrume carbón</label>
                </div>
                <div class="flex-name form-check">
                    <input class="form-check-input" type="checkbox" name="servicio1" value="2" id="mc">
                    <label for="mc" class="form-check-label">Mezcla carbón</label>
                </div>
            </div>
            <br>
            <input class="article-button" type="submit" name="finServiceMas" value="Finalizar Servicio">
            </form>

        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>