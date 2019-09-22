<?php
session_start();

$givenEmail = $_POST['givenEmail'];
$givenPword = $_POST['givenPword'];

if ($givenEmail == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your email";
    //Redirect to login page
    header("Location: index.php");
    die();
}

else if ($givenPword == "") {
    //Set message
    $_SESSION["message"] = "You need to fill your password";
    //Redirect to login page
    header("Location: index.php");
    die();
}

else {
//Taking the databese connection code fron config.php
require_once("config/config.php");
//Selecting the data from the user based on given email
$sql = "SELECT personID, firstname, lastname, pword, email, balance, account, card FROM userInformation WHERE email = '".$givenEmail."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["pword"] == $givenPword) {
            // Set session variables
            $_SESSION["firstname"] = $row["firstname"];
            $_SESSION["lastname"] = $row["lastname"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["pword"];
            $_SESSION["balance"] = $row["balance"];
            $_SESSION["balance"] = $row["balance"];
            $_SESSION["account"] = $row["account"];
            $_SESSION["personID"] = $row["personID"];
            $_SESSION["card"] = $row["card"];
            $_SESSION["loggedin"] = "true";
            unset($_SESSION["message"]);
            header("Location: home.php");
            die(); 
        }
        else {
           //Set message
            $_SESSION["message"] = "Wrong password!";
            //Redirect to login page
            header("Location: index.php");
            die(); 
        }
    }
} else {
    //Set message
    $_SESSION["message"] = "Check your email";
    //Redirect to login page
    header("Location: index.php");
    die();
}

//Ending the database connection
$conn->close();
}
?>