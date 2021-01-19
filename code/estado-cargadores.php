<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: index.php');
}else{
    if($_SESSION['rol'] != 2){
        header('location: index.php');
    }elseif($_SESSION['rol'] != 2){
        header('location: index.php');
    }
}

include_once('includes/estado.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="images/ensayo.png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Nuevo Servicio</title>
</head>

<body>
    <div class="header">
        <div class="backButton">
            <a class="img-backButton" href="index.php"><img src="images/back_button.png" alt=""></a>
        </div>
        <div class="header-logo-servicio">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida-servicio">
            <h1>Estado de los Cargadores</h1>
        </div>
    </div>
    <div class="article">


        <div class="estadoCarga">

            <div class="flex-container">
            <div class="flex-item">
                    <?php
                    if ($estado1 === 1) {
                        echo '<img class="img-button1-1" type="image" src="images/camion_verde.jpg" name="cargadorUno" value="" >';
                    } else {
                        echo '<img class="img-button1-1" type="image" src="images/camion_rojo.jpg" name="cargadorUno" value="" >';
                    }
                    ?>
                    <p><strong>&nbsp; Cargador 1</strong></p>
                </div>
                <div class="flex-item">
                    <?php
                    if ($estado2 === 1) {
                        echo '<img class="img-button2-1" type="image" src="images/camion_verde.jpg" name="cargadorDos" value="" >';
                    } else {
                        echo '<img class="img-button2-1" type="image" src="images/camion_rojo.jpg" name="cargadorDos" value="" >';
                    }
                    ?>
                    <p><strong>&nbsp; Cargador 2</strong></p>
                </div>
            </div>

        </div>

    </div>

</body>

</html>