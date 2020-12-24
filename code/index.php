<?php

include_once('includes/user.php');
include_once('includes/user-sesion.php');

$userSession = new userSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once('index-operario.php');
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //echo "Validación de Login";

    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm,$passForm)){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once('index-operario.php');
    }else{
        //echo "ususario y/o contraseña erronea";
        $errorLogin = "Nombre de usuarrio y/o contraseña incorrecta";
        include_once("index-d.php");
    }
}else{
    include_once('index-d.php');
}