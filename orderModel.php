<?php
require_once "dbconfig.php";

function getOrderList($uID)
{
    global $db;
    $sql = "SELECT ordID, orderDate, status FROM userorder WHERE uID=?";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "s", $uID); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
    return $result;
}

function getConfirmedOrderList()
{
    global $db;
    $sql = "SELECT ordID, uID, orderDate FROM userorder WHERE status=1";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    //mysqli_stmt_bind_param($stmt, "s", $uID); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
    return $result;
}

function _getCartID($uID)
{
    //get an unfished order (status=0) from userorder
    global $db;
    $sql = "SELECT ordID FROM userorder WHERE uID=? and status=0";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "s", $uID); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
    if ($row=mysqli_fetch_assoc($result)) {
        return $row["ordID"];
    } else {
        //no order with status=0 is found, which means we need to creat an empty order as the new shopping cart
        $sql = "insert into userorder ( uID, status ) values (?,0)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "s", $uID); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //執行SQL
        $newOrderID=mysqli_insert_id($db);
        return $newOrderID;
    }
}

function addToCart($uID, $prdID)
{
    global $db;
    $ordID= _getCartID($uID);
    $sql = "insert into orderitem (ordID, prdID, quantity) values (?,?,1);";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "ii", $ordID, $prdID); //bind parameters with variables
    return mysqli_stmt_execute($stmt);  //執行SQL
}

function removeFromCart($serno)
{
    global $db;
    $sql = "delete from orderitem where serno=?;";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "i", $serno); //bind parameters with variables
    return mysqli_stmt_execute($stmt);  //執行SQL
}

function checkout($uID, $address)
{
    global $db;
    $ordID= _getCartID($uID);
    $sql = "update userorder set orderDate=now(),address=?,status=1 where ordID=?;";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "si", $address, $ordID); //bind parameters with variables
    return mysqli_stmt_execute($stmt);  //執行SQL
}

function shipout($ordID)
{
    global $db;
    $sql = "update userorder set status=2 where ordID=?;";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "i", $ordID); //bind parameters with variables
    return mysqli_stmt_execute($stmt);  //執行SQL
}

function getCartDetail($uID)
{
    global $db;
    $ordID= _getCartID($uID);
    $sql="select orderitem.serno, product.name, product.price, SUM(orderitem.quantity) AS quantity from orderitem JOIN product ON(orderitem.prdID=product.prdID and orderitem.ordID=?) GROUP BY product.name
";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "i", $ordID); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
    return $result;
}


function getOrderDetail($ordID)
{
    global $db;
    $sql="select orderitem.serno, product.name, product.price, SUM(orderitem.quantity) AS quantity from orderitem JOIN product ON(orderitem.prdID=product.prdID and orderitem.ordID=?) GROUP BY product.name";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "i", $ordID); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    $result = mysqli_stmt_get_result($stmt); //get the results
    return $result;
}
