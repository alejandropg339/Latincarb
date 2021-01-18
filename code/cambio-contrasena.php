<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: index.php');
    }
}
include_once('includes/usuarios.php');
include_once('includes/contrasena.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Cambio de contraseña</title>
</head>

<body>
    <div class="header">
        <div class="backButton">
            <a class="img-backButton" href="index.php"><img src="images/back_button.png" alt=""></a>
        </div>
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida">
            <h1>Cambio de Contraseña</h1>
        </div>
    </div>
    <div class="text">
        <p>Selecciones el usuario al que desea cambiarle la contraseña</p>
    </div>
    <div class="article">
        <form method="POST">
            <div class=" article">
                <div class="container-selectors">
                    <select class="selectores" name="opUsuario" required>Seleccionar Usauario
                        <option value="" selected disabled hidden>Seleccionar usuario</option>
                        <?php
                    foreach ($resultadoUsuario as $opciones) :
                    ?>
                        <option value="<?php echo $opciones['cedula'] ?>">
                            <?php echo $opciones['nombre'] . '&nbsp;' . $opciones['apellido'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            
                <p id="text3" style="padding: 20px 50px 20px 40px;">Introduzca la nueva contraseña del usuario</p>
            

            <div class="container-selectors">
                <input class="article-input" type="text" name="contrasenaNew"
                    placeholder="Nueva Contraseña" required>
                <input class="article-button" type="submit" name="actualizarContrasena" value="Cambiar contraseña">
            </div>

    </div>
    </form>

</body>

</html>