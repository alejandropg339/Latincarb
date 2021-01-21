<?php

include_once('con_db.php');


if(isset($_POST['actualizarContrasena'])){
    $usuario = $_POST['opUsuario'];
    $password4 = $_POST['contrasenaNew'];

    if(strlen($usuario)>=1 && strlen($password4)>=6){
        $passwordNew = md5($password4);
        $updatePassword = "UPDATE usuario SET contrasena = '$passwordNew' WHERE usuario.cedula = '$usuario';";
        $resultadoUpdate = mysqli_query($conexion,$updatePassword);

        if($resultadoUpdate){
            echo'<script type="text/javascript">
            alert("La contraseña se ah actualizado");
            window.location.href="#";
            </script>
            ';
        }else{
            echo'<script type="text/javascript">
            alert("Algo salio mal, por favor intento de nuevo");
            window.location.href="#";
            </script>
            ';
        }
    }else{
        echo'<script type="text/javascript">
            alert("La contraseña a actualizar debe ser mayor a 5 caracteres");
            window.location.href="#";
            </script>
            ';
    }
}