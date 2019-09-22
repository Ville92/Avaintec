<?php
session_start();
/*
if (tultiin login sivulta) {
    $_SESSION["message"] = "";
}
else {}
*/
$givenFname = $_POST['givenFname'];
$givenLname = $_POST['givenLname'];
$givenEmail = $_POST['givenEmail'];
$givenPword = $_POST['givenPword'];
$givenPword2 = $_POST['givenPword2'];

//CHECKING IF THE FIRSTNAME FIELD HAS TEXT IN IT
if ($givenFname == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your first name";
    //Redirect to login page
    header("Location: register.php");
    die(); 
}

//CHECKING IF THE LAST NAME FIELD HAS TEXT IN IT
else if ($givenLname == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your last name";
    //Redirect to login page
    header("Location: register.php");
    die(); 
}

//CHECKING IF THE EMAIL FIELD HAS TEXT IN IT
else if ($givenEmail == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your email";
    //Redirect to login page
    header("Location: register.php");
    die(); 
}

//CHECKING IF THE PASSWORD FIELD HAS TEXT IN IT
else if ($givenPword == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your password";
    //Redirect to login page
    header("Location: register.php");
    die(); 
}

//CHECKING IF THE RETYPE PASSWORD FIELD HAS TEXT IN IT
else if ($givenPword2 == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your repeat password";
    //Redirect to login page
    header("Location: register.php");
    die(); 
}

//CHECKING IF THE PASSWORDS MATCH
else if ($givenPword != $givenPword2) {
    //Set message
    $_SESSION["message"] = "Your passwords don't match";
    //Redirect to login page
    header("Location: register.php");
    die(); 
}

else {
//CHECKING IF THE GIVEN EMAIL IS ALREADY IN THE DATABASE
require_once("config/config.php");

//SELECTING THE DATA FROM THE USER BASED ON GIVEN EMAIL
$sql = "SELECT email FROM userInformation WHERE email = '".$givenEmail."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //OUTPUT DATA OF EACH ROW
    while($row = $result->fetch_assoc()) {
            echo "Annettu email on:" . $givenEmail;
            echo "Haettu Email on: " . $row["email"];
            $_SESSION["message"] = "This email is already in use!";
            header("Location: register.php");
            die(); 
    }
} else {
    //RANDOMIZING THE USER'S ACCOUNT NUMBER
    $randomAccount = "FI".rand(0,9).rand(0,9)." ".rand(0,9).rand(0,9).rand(0,9).rand(0,9)." ".rand(0,9).rand(0,9).rand(0,9).rand(0,9)." ".rand(0,9).rand(0,9).rand(0,9).rand(0,9)." ".rand(0,9).rand(0,9);
    //INSERTING GIVEN INFO TO THE DATABASE
    $sql = "INSERT INTO userInformation (firstname, lastname, email, pword, account) VALUES ('".$givenFname."', '".$givenLname."', '".$givenEmail."', '".$givenPword."','".$randomAccount."')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Your account was created succesfully, you can now login!";
        header("Location: index.php");
        die();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
}
?>