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
include_once('includes/usuarios.php');
include_once('includes/servicio.php');
include_once('includes/global.php');
//include_once('includes/finalizarServicio.php');
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
    <title>Nuevo Servicio</title>
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
            <h1>Nuevo Servicio</h1>
        </div>
    </div>
    <div class="article">
    <form method="POST">
            <div class="text-container ms-md-5">
            <p class="article-service ms-md-5">Seleccione el usuario al que se le prestará el servicio</p>
            </div>
            <div class="container-selectors">
                <select class="selectores" name="opUsuario" required>Seleccionar Usauario
                    <option value="" selected disabled hidden>Seleccionar usuario</option>
                    <?php
                    foreach ($resultadoUsuario as $opciones) :
                    ?>
                        <option value="<?php echo $opciones['cedula'] ?>"><?php echo $opciones['nombre'] . '&nbsp;' . $opciones['apellido'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="text-container ms-md-5">
            <p class="article-service ms-md-5">Seleccione el servicio a prestar</p>
            </div>
            <div class="container-selectors">
                <select class="selectores" name="opServicio" required>
                    <option value="" selected disabled hidden>Seleccionar Servicio</option>
                    <option value="1">CARGUE DOBLETROQUE</option>
                    <option value="2">CARGUE TRACTOMULA</option>
                    <option value="3">ARRUME CARBÓN</option>
                    <option value="4">MEZLA DE CARBÓN</option>
                    <option value="5">MÁS DE UN SERVICIO</option>
                </select>
            </div>
            <div class="text-container ms-md-5">
            <p class="article-service ms-md-5">Seleccione un cargador</p>
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
            <br>
            <input class="article-button mb-3" name="inicia" type="submit" value="Iniciar Servicio">
        </form>
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>