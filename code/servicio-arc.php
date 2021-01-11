<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 3) {
        header('location: index.php');
    }
}
include_once('includes/finalizarServicioArc.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Servicio arrume Carbón</title>
</head>
<body>
    <div class="header">
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
            <div class="header-bievenida">
                <h1 class="big-title">Servicio de Arrume de Carbón</h1>
            </div>
        </div>
    <div class="article">
        <p class="article-espacio"></p>
        <p class="article-service-center">Servicio iniciado a las:<br> <?php echo " ".$resultadoFinalBusqueda2 ?></p>
        <form method="POST">
            <div class="container-selectors">
            <input class="article-button" type="submit" name="finServiceArc" value="Finalizar Servicio">
        </div>
        </form>
    </div>
</body>
</html>