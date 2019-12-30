<?php
require_once "dbconfig.php";

function getUserProfile($ID, $passWord)
{
    global $db;
    $sql = "SELECT name, role  FROM user WHERE ID=? and password=?";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "ss", $ID, $passWord); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results

    if ($row=mysqli_fetch_assoc($result)) {
        //return user profile
        $ret=array('uID' => $ID, 'uName' => $row['name'], 'uRole' => $row['role']);
    } else {
        //ID, password are not correct
        $ret=null;
    }
    return $ret;
}

function addUser($uID, $PWD, $name, $role = 1)
{
    global $db;
        $sql = "INSERT INTO user (ID, password, name, role) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $uID, $PWD, $name, $role);
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: loginUI.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
