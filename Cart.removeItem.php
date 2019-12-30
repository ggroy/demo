<?php
session_start();
//check whether the user has logged in or not
if (! isSet($_SESSION["loginProfile"])) {
    //if not logged in, redirect page to loginUI.php
    header("Location: loginUI.php");
}

require "orderModel.php";


$serno=(int)$_GET['serno'];
removeFromCart($serno);
header("Location: Cart.showDetail.php");
?>
