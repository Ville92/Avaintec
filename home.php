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
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto:400,500,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="windowBig">
    <h1 class="bigMargin">Home</h1>
    <h3>Hello <?php echo $_SESSION["firstname"];?>!</h3>
    <h3>Your balance is</h3>
    <a href="account.php"><p class="balance"><?php echo $_SESSION["balance"];?> €</p></a>
    <div class="topRight"><a href="settings.php"><img class="icon" src="img/settings.png"></a></div>
    <div class="bottomLeft"><a href="account.php"><img class="icon" src="img/account.png"></a></div>
    <div class="bottomRight"><a href="sendMoney.php"><img class="icon" src="img/send.png"></a></div>
    <div class="topLeft"><a href="logout.php"><img class="icon" src="img/logout.png"></a></div>
</div>
</body>
</html>