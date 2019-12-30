<?php
/*
副程式
*/
session_start();
function chkAccess($minRole,$url)
{
    //check whether the user has logged in or not
    if ($minRole >=0) {
        if (! isSet($_SESSION["loginProfile"])) {
            //if not logged in, redirect page to loginUI.php
            header("Location: loginUI.php");
        }
        
        if ($_SESSION['loginProfile']['uRole'] < $minRole) {
            header("Location: $url");
        }
    }
}
?>