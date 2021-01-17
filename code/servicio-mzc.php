<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 3 && $_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}
include_once('includes/finalizarServicioMzc.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Servicio Mezlca Carbón</title>
</head>
<body>
    <div class="container">
    <div class="header">
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
            <div class="header-bievenida">
                <h1 class="big-title">Servicio de Mezcla de Carbón </h1>
            </div>
        </div>
    <div class="article">
        <p class="article-espacio"></p>
        
        <p class="article-service-center">Servicio iniciado a las: <br> <?php echo " ".$resultadoFinalBusqueda2 ?></p>

        <form method="POST">
            <div class="container-selectors">
            <input class="article-button" type="submit" name="finServiceMzc" value="Finalizar Servicio">
        </div>
        </form>
    </div>
    </div>
    <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>