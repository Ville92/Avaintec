<?php
session_start();
//IF SESSION MESSAGE EXISTS ECHO IT. IF NOT, DONT DO ANYTHING
if (isset($_SESSION["message"])) {
    echo "<p class='message' id='message' onclick='removeMessage()'>".$_SESSION['message']."</p>";
}
else {
}
//Check if user is logger in
if ($_SESSION["loggedin"] == "true") {
    
}
else {
    header("Location: http://localhost/Avaintec/index.php");
    die();
}
?>

<?php
$accountData = array();
//Taking the databese connection code fron config.php
require_once("config/config.php");
$sql = "SELECT date, action, amount FROM accountInformation WHERE userID =".$_SESSION["personID"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
            array_push ($accountData, "<tr><td>".$row["date"]."</td><td>".$row["action"]."</td><td class='amount'>".$row["amount"]."</td></tr>");
    }
} else {
}

//Ending the database connection
$conn->close();


?>


<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto:400,500,700&display=swap" rel="stylesheet">
</head>
<body>
 <div class="popupS" id="addCardPopup">
        <form method="post" action="saveCard.php">
            <h3>Add card</h3>
            <p>Card number</p>
            <input type='text' name='givenCard'>
            <div class="buttons">
                <input class="button" type="submit" value="Add">
                <input class="button" type="button" onclick="closePopup(1)" value="Cancel">
            </div>
        </form>
</div>
    <div class="popper" id="addCardPopper"></div>
<div class="windowSmall">
    <h1>Settings</h1>
    <?php if ($_SESSION["card"] == "") {
        echo "<a href='#'><h3 class='accountNumber' onclick='popup(1)'>Add card</h3></a>";
    }
    else {
        echo "<h3 class='accountNumber'>Your card: ".$_SESSION["card"]. "<a href='removeCard.php'><img class='removeCard' src='img/remove.png'></a></h3>";
    }
    ?>
    <form method="post" action="saveSettings.php">
        <p>First name</p>
        <?php echo "<input type='text' name='firstname' value='".$_SESSION["firstname"]."'>"; ?>
        <p>Last name</p>
        <?php echo "<input type='text' name='lastname' value='".$_SESSION["lastname"]."'>"; ?>
        <p>Email</p>
        <h6><?php echo $_SESSION["email"]; ?></h6>
        <p>Account number</p>
        <h6><?php echo $_SESSION["account"]; ?></h6>

        <input class="button" type="submit" name="saveSettings" value="Save">
    </form>
    <form method="post" action="back.php">
    <input class="back" type="submit" name="backSettings" value="">
    </form>
</div>
    
<script>
function popup(selectedPopup) {
    if (selectedPopup == 1) {
        document.getElementById("addCardPopup").style.display = "block";
        document.getElementById("addCardPopper").style.display = "block";
    }
    
    else {}
}
    
function closePopup(selectedPopup) {
    if (selectedPopup == 1) {
        document.getElementById("addCardPopup").style.display = "none";
        document.getElementById("addCardPopper").style.display = "none";
    }
    
    else {}
}
</script>
</body>
</html>