<?php
session_start();

$givenFname = $_POST['firstname'];
$givenLname = $_POST['lastname'];

//CHECKING IF THE FIRSTNAME FIELD HAS TEXT IN IT
if ($givenFname == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your first name";
    //Redirect to login page
    header("Location: settings.php");
    die(); 
}

//CHECKING IF THE LAST NAME FIELD HAS TEXT IN IT
else if ($givenLname == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your last name";
    //Redirect to login page
    header("Location: settings.php");
    die(); 
}

else {
//CHECKING IF THE GIVEN EMAIL IS ALREADY IN THE DATABASE
require_once("config/config.php");


$sql = "UPDATE userInformation SET firstname='".$givenFname."', lastname='".$givenLname."' WHERE personID=".$_SESSION["personID"];
    $_SESSION["firstname"] = $givenFname;
    $_SESSION["lastname"] = $givenLname;

    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Your settings were saved!";
        header("Location: settings.php");
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>