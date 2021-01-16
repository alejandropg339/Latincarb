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
include_once('includes/informe-admin-usuario.php');
//include_once('includes/pruebaaa.php');
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
            <h1>Informe Usuario</h1>
        </div>
    </div>
    <div class="text">
    <p>Selecciones el usuario al que se le generará el informe</p>
    </div>
    <form method="POST">
    <div class=" article">
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
            </div>

    <div class="text">
        <p>Seleccione la fecha inicial desde la cual desea generar el informe </p>
    </div>

    <div class="flex-container">
        
            <input class="fechas" type="date" name="fechaInicial" placeholder="Fecha Final">
        

    </div>
    <div class="text">
        <p>Seleccione la fecha final desde la cual desea generar el informe </p>
    </div>
    <div class="flex-container">
  
            <input class="fechas" type="date" name="fechaFinal" placeholder="Fecha Final">

    </div>
    <div class="article">
        <br>
            <input class="article-button" type="submit" name="generarInforme" value="Generar Informe">

    </div>
    </form>

</body>

</html>