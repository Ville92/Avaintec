<?php
session_start();
//IF SESSION MESSAGE EXISTS ECHO IT. IF NOT, DONT DO ANYTHING
if (isset($_SESSION["message"])) {
    echo "<p class='message'>".$_SESSION["message"]."</p>";
}
else {
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bank</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto:400,500,700&display=swap" rel="stylesheet">
<meta charset="UTF-8">

</head>
    
<body> 
    
<div class="window">
<form method="post" action="login.php">
    <p>Email</p>
    <input type="text" name="givenEmail" placeholder="Email"/>
    <p>Password</p>
    <input type="password" name="givenPword" placeholder="Password"/>

    <input class="button" type="submit" name="login" value="Login">
</form>
<form method="post" action="back.php">
    <h4>Don't have an account yet?<input class="cleanButton" type="submit" name="backRegister" value="Register"></h4>
</form>
    <img class="fingerprint" src="img/fingerprint.png">
</div>
    
<script>
    function removeMessage() {
        document.getElementById('message').style.display = 'none';
    }
</script>
</body>
</html>
