<?php
    include_once('con_db.php');

    $psadmin=1;
    $padmin=2;
    $poperario=3;
    $pusuario=4;

    if(isset($_POST['registrar'])){
        if(
            strlen($_POST['cedulaRegistro']) >=7 && 
            strlen($_POST['nombreRegistro']) >=1 && 
            strlen($_POST['apellidoRegistro']) >=1 && 
            strlen($_POST['passwordRegistro']) >=7 && 
            strlen($_POST['passwordRegistro2']) >=7 && 
            strlen($_POST['numeroRegistro']) >=7 && 
            strlen($_POST['optRegistro']) >=1
        ){
            $cedula=trim($_POST['cedulaRegistro']);
            $nombre=trim($_POST['nombreRegistro']);
            $apellido=trim($_POST['apellidoRegistro']);
            $correo=trim($_POST['correoRegistro']);
            $password=md5(trim($_POST['passwordRegistro']));
            $password2=md5(trim($_POST['passwordRegistro2']));
            $numero=trim($_POST['numeroRegistro']);
            $opt=trim($_POST['optRegistro']);

            if($password === $password2){
                $insercion="INSERT INTO `usuario`(`cedula`, `nombre`, `apellido`, `email`, `username`, `contrasena`, `telefono`, `rol_id`) VALUES ('$cedula','$nombre','$apellido','$correo','$cedula','$password','$numero','$opt')";
            $resultado = mysqli_query($conexion, $insercion);
            if ($resultado) {
                echo '<script language="javascript">';
                echo 'alert("Te has registrado exitosamente")';
                echo '</script>';
            
            } else {
                echo '<script language="javascript">';
                echo 'alert("Algo salio mal")';
                echo '</script>';
   
            }
            }

            
        }else{
            echo '<script language="javascript">';
            echo 'alert("Por la contraseña debe ser mayor o igual 6 caracteres")';
            echo '</script>';
        }
    }
    mysqli_close($conexion);
?>