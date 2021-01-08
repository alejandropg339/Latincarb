<?php

session_start();
if(!isset($_SESSION['rol'])){
    header('location: index-d.php');
}else{
    if($_SESSION['rol'] != 2){
        header('location: index-d.php');
    }
}

include_once('includes/actividades-back.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Bienvenido Administrador</title>
</head>

<body>
    <div class="header">
    <a class="log" style="color: green; padding-top:40px; padding:20px; display:inline-block; margin: auto;" href="logout.php">Cerrar Sesión &nbsp;<i class="fas fa-sign-out-alt"></i></a>
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida">
            <h1>Bienvenido</h1>
        </div>
    </div>

    <div class="article">
        <p>Seleccione una actividad a realizar </p>
        <?php
            for ($i = 1; $i <= $numero; $i++) {
                $mostrar = mysqli_fetch_array($resultado)
            ?>
                <tr>
                    <td align="center"><?php echo '<ul style="list-style-type:none; margin-left: -40px;" ><li style="list-style:none;">' . '<a class="article-button" href="' . $mostrar['enlace'] . '" target="_self">' . $mostrar['actividad'] . '</a>' . '</li></ul>'; ?></td>
                </tr>

            <?php
            }
            mysqli_close($conexion); ?>
        <!--<input class="article-button" type="submit" name="iniciarServicio" value="Iniciar Servicio">
        <div class="article-espacio"></div>
        <input class="article-button" type="submit" name="mantenimiento" value="Realizar Mantenimiento">
        <div class="article-espacio"></div>
        <input class="article-button" type="submit" name="informes" value="Generar Informes">
        <div class="article-espacio"></div>
        <input class="article-button" type="submit" name="estadoCargadores" value="Estado de los Cargadores">-->
    </div>
</body>

</html>