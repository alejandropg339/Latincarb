<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}
require("includes/register.php");
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
    <title>Registro de Usuarios</title>
</head>

<body>
    <div class="container-sm">
    <div class="row mx-lg-5">
    <div class="col mx-lg-5">
    <div class="header">
        <div class="header-logo-servicio">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida-servicio">
            <h1>Registro de Usuarios</h1>
        </div>
    </div>
    <div class="article">
        <p class="article-service-ms mx-lg-5">Digite la cedula del usuario</p>
        <div class="container-selectors-ns">
            <form method="POST">
                <!--<div class="container-selectors">-->
                <input class="article-input" type="number" name="cedulaRegistro" placeholder="Cedula o nit*" required>
        </div>
        <p class="article-service-ms mx-lg-5">Digite el nombre del usuario</p>
        <div class="container-selectors-ns">
            <input class="article-input" type="text" name="nombreRegistro" placeholder="Nombre del usuario*" required>
        </div>

        <p class="article-service-ms mx-lg-5">Digite el apellido del usuario</p>
        <div class="container-selectors-ns">
            <input class="article-input" type="text" name="apellidoRegistro" placeholder="Apellido del usuario">
        </div>

        <p class="article-service-ms mx-lg-5">Digite el correo del usuario</p>
        <div class="container-selectors-ns">
            <input class="article-input" type="email" name="correoRegistro" placeholder="Correo del usuario">
        </div>

        <p class="article-service-ms mx-lg-5">Digite la contraseña del usuario</p>
        <div class="container-selectors-ns">
            <input class="article-input" type="text" name="passwordRegistro" placeholder="Contraseña del usuario*" required>
        </div>

        <p class="article-service-ms mx-lg-5">Confirmar la contraseña del usuario</p>
        <div class="container-selectors-ns">
            <input class="article-input" type="text" name="passwordRegistro2" placeholder="Contraseña del usuario*" required>
        </div>

        <p class="article-service-ms mx-lg-5">Digite el teléfono del usuario</p>
        <div class="container-selectors-ns">
            <input class="article-input" type="number" name="numeroRegistro" placeholder="Teléfono del usuario*" required>
        </div>

        <p class="article-service mx-lg-5">Seleccione el rol del usuario a registrar</p>
        <div class="container-selectors">
            <select class="selectores" name="optRegistro">Seleccionar rol de usuario
                <option value="" selected disabled hidden>Seleccionar rol de usuario</option>
                <option value="2">Administrador</option>
                <option value="3">Operario</option>
                <option value="4">Usuario</option>
            </select>
        </div>

        <br>

        <input class="article-button mb-5" name="registrar" type="submit" value="Finalizar Registro">
        </form>
    </div>
    </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>