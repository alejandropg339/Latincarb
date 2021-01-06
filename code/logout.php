<?php

include_once('includes/user-sesion.php');

$userSession = new userSession();
$userSession->closeSession();

header("location: index-d.php");