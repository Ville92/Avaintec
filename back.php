<?php
session_start();

//HANDELING THE REGISTER, LOGIN & BACK NAVIGATIONS

if(isset($_POST['backRegister'])) {
    //Set message
    unset($_SESSION["message"]);
    header("Location: register.php");
    die(); 
}

else if(isset($_POST['backLogin'])) {
    //Set message
    unset($_SESSION["message"]);
    header("Location: index.php");
    die();
}

else {
    //Set message
    unset($_SESSION["message"]);
    header("Location: home.php");
    die(); 
}
?>
