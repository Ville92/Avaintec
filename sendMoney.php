<?php
session_start();
//IF SESSION MESSAGE EXISTS ECHO IT. IF NOT, DONT DO ANYTHING
if (isset($_SESSION["message"])) {
    echo "<p class='message' id='message' onclick='removeMessage()'>".$_SESSION['message']."</p>";
}
else {
}

if (isset($_SESSION["confirmation"])) {
    echo '<div class="popupT" style="display: block;" id="addCardPopup"><form method="post" action="confirmSend.php"><h3>Confirm transaction</h3><p>'.$_SESSION["receiversFirstname"].' '.$_SESSION["receiversLastname"].'</p><p>'.$_SESSION["receiversEmail"].'</p><p>'.$_SESSION["givenAmount"].' €</p><div class="buttons">
    <input class="button" type="submit" value="Send"><input class="button" type="submit" name="cancel" value="Cancel"></div></form></div><div style="display: block;" class="popper" id="addCardPopper"></div>';
}
else {
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Making a transfer</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto:400,500,700&display=swap" rel="stylesheet">
<meta charset="UTF-8">

</head>
    
<body>
    
<div class="windowSmall">
    <h1>Transfer money</h1>
<form method="post" action="checkSend.php">
    <p>Receiver's Email</p>
    <input type="text" name="receiverEmail">
    <p>Amount</p>
    <input type="text" name="givenAmount">

    <input class="button" type="submit" name="sendMoney" value="Send">
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
