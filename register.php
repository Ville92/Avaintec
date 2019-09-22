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
<title>Bank</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto:400,500,700&display=swap" rel="stylesheet">
<meta charset="UTF-8">

</head>
    
<body>
<div class="mobileBg">
<div class="window">
    <form method="post" action="saveUser.php">
        <p>First name</p>
        <input type="text" name="givenFname">
        <p>Last name</p>
        <input type="text" name="givenLname">
        <p>Email</p>
        <input type="text" name="givenEmail">
        <p>Password</p>
        <input type="password" name="givenPword">
        <p>Repeat password</p>
        <input type="password" name="givenPword2">

        <input class="button" type="submit" name="register" value="Register">
    </form>
    <form method="post" action="back.php">
    <h4>Do you already have an account?<input class="cleanButton" type="submit" name="backLogin" value="Login"></h4>
</form>
</div>
</div>

</body>
</html>