<?php
session_start();
$receiverEmail = $_POST["receiverEmail"];
$givenAmount = $_POST["givenAmount"];

if ($receiverEmail == $_SESSION["email"]) {
        $_SESSION["message"] = "You can't send money to yourself!";
        //Redirect to
        header("Location: sendmoney.php");
        die(); 
    }
else {}

if(empty($receiverEmail)) {
    $_SESSION["message"] = "You need to fill in the email!";
        //Redirect to
        header("Location: sendmoney.php");
        die(); 
}

else if(empty($givenAmount)) {
    $_SESSION["message"] = "You need to fill in the amount!";
    //Redirect to
    header("Location: sendmoney.php");
    die(); 
}

else if(!is_numeric($givenAmount)) {
    $_SESSION["message"] = "Amount needs to be a number!";
    //Redirect to
    header("Location: sendmoney.php");
    die(); 
}
else {
//Taking the databese connection code fron config.php
require_once("config/config.php");
//TAKING THE SENDERS BALANCE
$sql = "SELECT balance FROM userInformation WHERE personID =".$_SESSION["personID"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
            $_SESSION["yourBalance"] = $row["balance"];
    }
    $remaningBalance = $_SESSION["yourBalance"] - $givenAmount = $_POST["givenAmount"];
} else {}
    
//TAKING THE RECEIVERS INFO
$sql = "SELECT email, personID, balance, firstname, lastname FROM userInformation WHERE email ='".$receiverEmail."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
            $_SESSION["receiversEmail"] = $row["email"];
            $_SESSION["receiversBalance"] = $row["balance"];
            $_SESSION["receiversFirstname"] = $row["firstname"];
            $_SESSION["receiversLastname"] = $row["lastname"];
            $_SESSION["receiversID"] = $row["personID"];
            $_SESSION["givenAmount"] = $givenAmount;
    }
    $remaningBalance = $_SESSION["yourBalance"] - $givenAmount = $_POST["givenAmount"];
}
else {
    $_SESSION["message"] = "Check the email!";
    //Redirect to
    header("Location: sendmoney.php");
    die(); 
}
}
    
    //Redirect to
    $conn->close();
    //USING THIS TO GET THE POPUP
    $_SESSION["confirmation"] = true;
    unset($_SESSION["message"]);
    header("Location: sendmoney.php");
    die(); 
?>