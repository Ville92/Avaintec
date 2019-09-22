<?php
session_start();
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
            array_push ($accountData, "<tr><td class='date'>".$row["date"]."</td><td class='action'>".$row["action"]."</td><td class='amount'>".$row["amount"]." €</td></tr>");
    }
} else {
    array_push ($accountData, "<tr><td>No actions yet</tr>");
}
//Revessing the array so newest action will be on top
$accountDataR = array_reverse($accountData);

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
<div class="windowBig">
    <h1>Account</h1>
    <h3 class="accountNumber"><?php echo $_SESSION["account"];?></h3>
    <p class="balanceSmall"><?php echo $_SESSION["balance"];?> €</p>
    <table class="account">
        <?php foreach($accountDataR as $value){echo $value;} ?>
    </table>
    <form method="post" action="back.php">
    <input class="back" type="submit" name="backSettings" value="">
    </form>
</div>
</body>
</html>