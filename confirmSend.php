<?php
session_start();
if(isset($_POST['cancel'])) {
    //Set message
    unset($_SESSION["confirmation"]);
    header("Location: sendMoney.php");
    die(); 
}

//Taking the databese connection code fron config.php
require_once("config/config.php");
//TAKING THE SENDERS BALANCE
$sql = "SELECT balance FROM userInformation WHERE personID =".$_SESSION["personID"];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
            $_SESSION["yourBalance"] = $row["balance"];
    }
    $remaningBalance = $_SESSION["yourBalance"] - $_SESSION["givenAmount"];
} else {}
    
//REMOVING THE RIGHT AMOUNT FROM THE SENDER'S ACCOUNT
    $sql = "UPDATE userInformation SET balance='".$remaningBalance."' WHERE personID=".$_SESSION["personID"];

    if ($conn->query($sql) === TRUE) {
        echo "Everything went well";
        $_SESSION["balance"] = $remaningBalance;
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //ADDING THE RIGHT AMOUNT TO THE RECEIVER'S ACCOUNT
    $receiversBalance = $_SESSION["receiversBalance"] + $_SESSION["givenAmount"];
    $sql = "UPDATE userInformation SET balance='".$receiversBalance."' WHERE email ='".$_SESSION["receiversEmail"]."'";

    if ($conn->query($sql) === TRUE) {
        echo "Everything went well";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //INSERTING THE SENDER'S ACTION
    $sql = "INSERT INTO accountInformation (userID, date, action, amount) VALUES (".$_SESSION["personID"].", '".date("d.m.Y")."', '".$_SESSION["receiversEmail"]."', '-".$_SESSION["givenAmount"]."')";
    $result = $conn->query($sql);
    
    //INSERTING THE RECEIVER'S ACTION
    $sql = "INSERT INTO accountInformation (userID, date, action, amount) VALUES (".$_SESSION["receiversID"].", '".date("d.m.Y")."', '".$_SESSION["email"]."', '+".$_SESSION["givenAmount"]."')";
    $result = $conn->query($sql);

    //Ending the database connection
    $conn->close();
    
    
    //Redirect to
    $_SESSION["message"] = "The transfer was succesful!";
    unset($_SESSION["confirmation"]);
    header("Location: sendmoney.php");
    die(); 

?>