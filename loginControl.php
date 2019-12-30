<?php
session_start();

require "userModel.php";
$ID=$_POST['ID'];
$pwd=$_POST['PWD'];

$userProfile = getUserProfile($ID, $pwd);
if ($userProfile) {
    $_SESSION['loginProfile'] = $userProfile;
    if ($_SESSION['loginProfile']['uRole']>=9) {
        header("Location: admin.php");
    } else {
        header("Location: main.php");
    }
} else {
    echo "<h2 align = center>Login failed ...</h2>";
    // $_SESSION['loginProfile'] = null;
    session_destroy();
    header("refresh:1;url=loginUI.php");
}


?>
