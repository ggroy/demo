<?php
require_once "dbconfig.php";

function getPrdList()
{
    global $db;

    $sql = "SELECT prdID,name, price FROM product order by prdID";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    //mysqli_stmt_bind_param($stmt, "ss", $ID, $passWord); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
    return $result;
}

function getPrdDetail($prdID)
{
    global $db;

    $sql = "SELECT prdID,name, price,detail FROM product where prdID=?";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "i", $prdID); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
    return $result;
}

function addProduct($prdProfile)
{
    global $db;
    $sql="insert into product (name, price, detail) values (?,?,?);";

    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "sis", $prdProfile['name'], $prdProfile['price'], $prdProfile['detail']); //bind parameters with variables
    return    mysqli_stmt_execute($stmt);  //執行SQL
}

function updateProduct($prdID,$prdProfile)
{
    global $db;
    $sql="update product set name=?, price=?, detail=? where prdID=?";

    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    //bind parameters with variables
    mysqli_stmt_bind_param($stmt, "sisi", $prdProfile['name'], $prdProfile['price'], $prdProfile['detail'], $prdID); 
    return    mysqli_stmt_execute($stmt);  //執行SQL
}

function deleteProduct($prdID)
{
    global $db;
    $sql="delete from product where prdID=?";

    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "i", $prdID); //bind parameters with variables
    return    mysqli_stmt_execute($stmt);  //執行SQL

}
?>










