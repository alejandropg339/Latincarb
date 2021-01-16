<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Informes</title>
</head>

<body>
    <div class="header">
        <div class="backButton">
            <a class="img-backButton" href="index-admin.html"><img src="images/back_button.png" alt=""></a>
        </div>
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida">
            <h1>Informe Cargador 1</h1>
        </div>
    </div>

    <div class="text">
        <p>Seleccione la fecha inicial desde la cual desea generar el informe </p>
    </div>

    <div class="flex-container">
        <form>
            <input class="fechas" type="date" name="fechaInicial" placeholder="Fecha Final">
        </form>

    </div>
    <div class="text">
        <p>Seleccione la fecha final desde la cual desea generar el informe </p>
    </div>
    <div class="flex-container">
        <form>
            <input class="fechas" type="date" name="fechaFinal" placeholder="Fecha Final">
        </form>

    </div>
    <div class="article">
        <br>
        <form>
            <input class="article-button" type="submit" name="generarInforme" value="Generar Informe">
        </form>

    </div>

</body>

</html>