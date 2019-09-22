<?php
session_start();

$givenCard = $_POST['givenCard'];

//CHECKING IF THE FIRSTNAME FIELD HAS TEXT IN IT
if ($givenCard == "") {
    //Set message
    $_SESSION["message"] = "You need to fill the card number!";
    //Redirect to
    header("Location: settings.php");
    die(); 
}

else {
require_once("config/config.php");


$sql = "UPDATE userInformation SET card='".$givenCard."' WHERE personID=".$_SESSION["personID"];
    $_SESSION["card"] = $givenCard;

    if ($conn->query($sql) === TRUE) {
        $randomAmount = $randomAmount.rand(10,10000);
        $sql = "UPDATE userInformation SET balance='".$randomAmount."' WHERE personID=".$_SESSION["personID"];
         if ($conn->query($sql) === TRUE) {
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $_SESSION["balance"] = $randomAmount;
        $_SESSION["message"] = "The card was added succesfully!";
        header("Location: settings.php");
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
    //Redirect to
    header("Location: settings.php");
    die(); 
?>