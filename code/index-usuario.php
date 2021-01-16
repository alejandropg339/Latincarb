<?php

session_start();
if(!isset($_SESSION['rol'])){
    header('location: index-d.php');
}else{
    if($_SESSION['rol'] != 4){
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
    <script src="https://kit.fontawesome.com/eb42ca2408.js" crossorigin="anonymous"></script>
    <title>Bienvenido Usuario</title>
</head>

<body>
    <div class="header">
        <a class="log" style="color: green; padding-top:40px; padding:20px; display:inline-block; margin: auto;"
            href="logout.php">Cerrar Sesión &nbsp;<i class="fas fa-sign-out-alt"></i></a>
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida">
            <h1>Bienvenido </h1>
        </div>
    </div>

    <div class="article">
        <p>Esta aplicación le permitirá ver los informes de los servicios que la empresa
            Latincarb le ha prestado en un rngo de fechas que usted selccionará. </p>
        <div class="article-container">
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
        </div>
    </div>
</body>

</html>