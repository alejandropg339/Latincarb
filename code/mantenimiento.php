<?php

session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 3 && $_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}
include_once('includes/estado.php');
include_once('includes/iniciar-mantenimiento.php');
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
    <title>Mantenimiento</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="backButton">
                <a class="img-backButton" href="index-operario.php"><img src="images/back_button.png" alt=""></a>
            </div>
            <div class="header-logo-servicio">
                <img src="images/LOGO2.jpg" alt="latincarb">
            </div>
            <div class="header-bievenida-servicio">
                <h1>Mantenimiento</h1>
            </div>
        </div>
        <div class="article">
            <div class="ms-md-5">
                <p class="article-service ms-md-5">Seleccione el tipo de mantenimiento que desea realizar</p>
            </div>
            <form method="POST">
                <div class="container-selectors">
                    <select class="selectores" name="opMantenimiento" required>Seleccionar mantenimiento
                        <option value="" selected disabled hidden>Seleccionar mantenimiento</option>
                        <option value="1">COMBUSTIBLE</option>
                        <option value="2">ACEITES Y FILTROS</option>
                        <option value="3">ENGRASE GENERAL</option>
                        <option value="4">CAMBIO DE LLANTAS</option>
                        <option value="5">MANTENIMIENTO ELÉCTRICO</option>
                        <option value="6">MANTENIMIENTO MECANICO</option>
                        <option value="7">LAVADO GENERAL</option>
                    </select>
                </div>
                <div class="ms-md-5">
                    <p class="article-service ms-md-5">Seleccione el cargador al que se realizara mantenimiento</p>
                </div>
                <div class="flex-container">
                    <div class="flex-item">
                        <?php
                        if ($estado1 === 1) {
                            echo '<img class="img-button1-1" type="image" src="images/camion_verde.jpg" name="cargadorUno" value="" >';
                        } else {
                            echo '<img class="img-button1-1" type="image" src="images/camion_rojo.jpg" name="cargadorUno" value="" >';
                        }
                        ?>
                    </div>
                    <div class="flex-item">
                        <?php
                        if ($estado2 === 1) {
                            echo '<img class="img-button2-1" type="image" src="images/camion_verde.jpg" name="cargadorDos" value="" >';
                        } else {
                            echo '<img class="img-button2-1" type="image" src="images/camion_rojo.jpg" name="cargadorDos" value="" >';
                        }
                        ?>
                    </div>
                </div>

                <div class="flex-container">
                    <div class="flex-name form-check">
                        <?php
                        if ($estado1 === 1) {
                            echo '<input class="form-check-input" type="radio" name="cargador" value="1" id="c1">
                    <label for="c1" class="form-check-label">Cargador 1</label>';
                        } else {
                            echo '<input class="form-check-input" type="radio" name="cargador" value="1" id="c1" disabled>
                    <label for="c1" class="form-check-label">Cargador 1</label>';
                        }
                        ?>
                        <!-- Input oculto -->


                    </div>
                    <div class="flex-name form-check">

                        <?php
                        if ($estado2 === 1) {
                            echo '<input class="form-check-input" type="radio" name="cargador" value="2" id="c2">
                <label for="c2" class="form-check-label">Cargador 2</label>';
                        } else {
                            echo '<input class="form-check-input" type="radio" name="cargador" value="2" id="c2" disabled>
                <label for="c2" class="form-check-label">Cargador 2</label>';
                        }
                        ?>

                    </div>

                </div>
                <br><br>
                <input class="article-button" type="submit" name="iniciarMantenimiento" value="Iniciar Mantenimiento">
            </form>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>