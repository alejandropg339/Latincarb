<?php


if(isset($_POST['login'])){
    $GLOBALS['userG']=$_POST['username'];
}else{
    return $userG;
}