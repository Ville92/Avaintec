<?php
session_start();

//CHECKING IF THE GIVEN EMAIL IS ALREADY IN THE DATABASE
require_once("config/config.php");


$sql = "UPDATE userInformation SET card='' WHERE personID=".$_SESSION["personID"];
    $_SESSION["card"] = "";

    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE userInformation SET balance='0' WHERE personID=".$_SESSION["personID"];
        if ($conn->query($sql) === TRUE) {
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $_SESSION["balance"] = "0";
        $_SESSION["message"] = "Your card was removed!";
        header("Location: settings.php");
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
    //Redirect to
    header("Location: settings.php");
    die(); 
?>