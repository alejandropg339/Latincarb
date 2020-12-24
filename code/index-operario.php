<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/eb42ca2408.js" crossorigin="anonymous"></script>
    <title>Bienvenido Operario</title>
</head>

<body>
    <div class="header">
        <a class="log" style="color: green; padding-top:40px; padding:20px; display:inline-block; margin: auto;" href="logout.php">Cerrar Sesión &nbsp;<i class="fas fa-sign-out-alt"></i></a>
        <div class="header-logo">
            <img src="images/LOGO2.jpg" alt="latincarb">
        </div>
        <div class="header-bievenida">
            <h1>Bienvenido <?php echo $user->getNombre();?></h1>
        </div>
    </div>

    <div class="article">
        <p>En esta app usted deberá registrar cada uno de los servicios que preste, al igual que los mantenimientos que
            usted le realice a las maquinarías. </p>
            <div class="article-container">
        <a href="nuevo-servicio.html"> <input class="article-button" type="submit" name="iniciarServicio" value="Iniciar Servicio"></a>
        <div class="article-espacio"></div>
        <input class="article-button" type="submit" name="Mantenimiento" value="Realizar Mantenimiento">
    </div>
    </div>
</body>

</html>