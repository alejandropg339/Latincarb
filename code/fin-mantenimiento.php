<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 3) {
        header('location: index.php');
    }
}
include_once('includes/finalizarMantenimiento.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Servicio Tractomulas</title>
</head>
<body>
    <div class="header">
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
            <div class="header-bievenida">
                <h1 class="big-title">Mantenimiento</h1>
            </div>
        </div>
    <div class="article">
        <p class="article-espacio"></p>
        <p class="article-service">Digite el costo del mantenimiento</p>
        <form method="POST">
            <div class="container-selectors">
            <input class="article-input" type="number" name="costMantenimiento" placeholder="Costo del mantenimiento">
            <input class="article-button" type="submit" name="finMantenimiento" value="Finalizar Mantenimiento">
        </div>
        </form>
    </div>
</body>
</html>