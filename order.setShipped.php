<?php
session_start();
//check whether the user has logged in or not
if (! isSet($_SESSION["loginProfile"])) {
    //if not logged in, redirect page to loginUI.php
    header("Location: loginUI.php");
}
require "orderModel.php";
$ordID=(int)$_GET['id'];

if (shipout($ordID)) {
    echo "訂單已處理";
} else {
    echo "sorry, internal error, please try again..";    
}
?>
<a href="admin.php">OK</a>
