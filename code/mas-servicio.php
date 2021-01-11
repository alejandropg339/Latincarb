<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 3) {
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Mas de Un Servicio</title>
</head>
<body>
    <div class="header">
        <div class="header-logo-servicio">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida-servicio">
            <h1>Nuevo Servicio</h1>
        </div>
    </div>
    <div class="article">
        <p class="article-service-ms">Servicio iniciado a las: <br> <?php echo " ".$resultadoFinalBusqueda2 ?></p>
        <p class="article-service-ms">Digite la cantidad de dobletroques cargados</p>
        <div class="container-selectors-ns">
            <form method="POST">
                <!--<div class="container-selectors">-->
                <input class="article-input" type="number" name="cantDobletroque" placeholder="Cantidad de dobletroque">
            </div>
                <p class="article-service-ms">Digite la cantidad tractomulas cargadas</p>
                <div class="container-selectors-ns">
                    <input class="article-input" type="number" name="cantTractomula" placeholder="Cantidad de tractomulas">
                    </div>
                    <p class="article-service-ms">Seleccione si realizo al menos uno de estos dos servicios</p>
                    <br>
                    <div class="flex-container">
                        <div class="flex-name">
                            <label class="custom-radio-checkbox">
                                <!-- Input oculto -->
                                <input class="custom-radio-checkbox__input" type="radio" name="genero" value="cargadorUno">
                                <!-- Imagen en sustitucion --> 
                                <span class="custom-radio-checkbox__show custom-radio-checkbox__show--radio"></span>
                                <!-- Texto -->
                                <span class="custom-radio-checkbox__text">Arrume carbón</span>
                            </label>
                        </div>
                        <div class="flex-name">
                            <label class="custom-radio-checkbox">
                                <!-- Input oculto -->
                                <input class="custom-radio-checkbox__input" type="radio" name="genero" value="cargadorDos">
                                <!-- Imagen en sustitucion --> 
                                <span class="custom-radio-checkbox__show custom-radio-checkbox__show--radio"></span>
                                <!-- Texto -->
                                <span class="custom-radio-checkbox__text">Mezcla carbón</span>
                            </label>
                        </div>
                        </div>
                        <br>
                        <input class="article-button" type="submit" name="finServiceMas" value="Finalizar Servicio">
            </form>
    </div>
        
    
</body>
</html>