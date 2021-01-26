<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index-d.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: index-d.php');
    }
}

//include_once('includes/reportes-opt.php');

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
    <title>Informes</title>
</head>

<body>
    <div class="header">
        <div class="backButton">
            <a class="img-backButton" href="index-admin.php"><img src="images/back_button.png" alt=""></a>
        </div>
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida">
            <h1>Informes</h1>
        </div>
    </div>

    <div class="article">
        <p>Seleccion una de las opciones a la cual le desea generar un informe </p>
    </div>
    <div class="flex-container">
        <div class="flex-item">
            <a href="cargador1-reporte"><img style="border-radius: 5px;" class="img-button1"
                    src="images/camion_verde.jpg"></a>
        </div>
        <div class="flex-item">
            <a href="cargador2-reporte"><img style="border-radius: 5px;" class="img-button2"
                    src="images/camion_verde.jpg"></a><br>
        </div>
    </div>
    <div class="flex-container">

        <div class="flex-name"><a href="cargador1-reporte" style="text-decoration: underline; color:blue;"> Cargador
                1</a>
        </div>

        <div class="flex-name"><a href="cargador2-reporte"
                style="text-decoration: underline; color:blue; padding-right: 10px;"> Cargador 2</a>
        </div>

    </div>
    <br><br>
    <div class="flex-container">
        <div class="flex-item">
            <a href="admin-usuario-reporte"><img style="border-radius: 5px;" class="img-button3"
                    src="images/user-green.png"></a>
        </div>
        <div class="flex-item">
            <a href="admin-operario-reporte"><img style="border-radius: 5px;" class="img-button3"
                    src="images/user-green.png"></a>
        </div>
    </div>

    <div class="flex-container">

        <div class="flex-name"><a href="admin-usuario-reporte"
                style="text-decoration: underline; color:blue; padding-right: 10px;"> Usuario</a>
        </div>

        <div class="flex-name"><a href="admin-operario-reporte"
                style="text-decoration: underline; color:blue; padding-right: 10px;"> Operario</a>
        </div>
    </div>
    

</body>

</html>