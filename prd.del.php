<?php
session_start();
//check whether the user has logged in or not
if (! isSet($_SESSION["loginProfile"])) {
    //if not logged in, redirect page to loginUI.php
    header("Location: loginUI.php");
}
require "prdModel.php";
$id=(int)$_GET['id'];

if (deleteProduct($id)) {
    echo "prd已delete";
} else {
    echo "sorry, internal error, please try again..";    
}
?>
<a href="prdMain.php">back</a>
