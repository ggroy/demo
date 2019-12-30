<?php
session_start();

require "userModel.php";
$uID = $name = $PWD = $confirm_PWD = "";
$uID_err = $name_err = $PWD_err = $confirm_PWD_err ="";
if (empty(trim($_POST['uID']))) {
    $uID_err = "Please enter a username.";
} else {
    $sql = "SELECT ID FROM user WHERE ID = ?";
    if ($stmt = mysqli_prepare($db, $sql)) {
        $temp_ID = $_POST['uID'];
        mysqli_stmt_bind_param($stmt, "s", $temp_ID);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                $uID_err = "This user ID is already taken.";
            } else {
                $uID = trim($_POST['uID']);
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
if (empty(trim($_POST['name']))) {
    $name_err = "name can't be empty";
} else {
    $name = trim($_POST['name']);
}
if (empty(trim($_POST['PWD']))) {
    $PWD_err = "Please enter a password.";
} else {
    $PWD = trim($_POST['PWD']);
}
// confirm PWD
if (empty(trim($_POST['confirm_PWD']))) {
    $confirm_PWD_err = "Please confirm password.";
} else {
    $confirm_PWD = trim($_POST['confirm_PWD']);
    if (empty($PWD_err) && ($PWD != $confirm_PWD)) {
        $confirm_PWD_err = "Password did not match.";
    }
}
if (empty($uID_err) && empty($PWD_err) && empty($confirm_PWD_err)) {
    addUser($uID, $PWD, $name, $role = 1);
} else {
    $_SESSION['uID_err'] = $uID_err;
    $_SESSION['name_err'] = $name_err;
    $_SESSION['PWD_err'] = $PWD_err;
    $_SESSION['confirm_PWD_err'] = $confirm_PWD_err;
    header('location: registerUI.php');
}
