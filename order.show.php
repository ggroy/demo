<?php
session_start();
require "orderModel.php";
//check whether the user has logged in or not
if (! isSet($_SESSION["loginProfile"])) {
    //if not logged in, redirect page to loginUI.php
    header("Location: loginUI.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic HTML Examples</title>
</head>
<body>
<p>This is the list of you historical orders</p>
<hr>
Your Login status: ? 
<?php
    echo "Hello ", $_SESSION["loginProfile"]["uName"],
    ", Your ID is: ", $_SESSION["loginProfile"]["uID"],
    ", Your Role is: ", $_SESSION["loginProfile"]["uRole"],"<HR>";

    $result=getOrderList($_SESSION["loginProfile"]["uID"]);
?>
    <table width="200" border="1">
  <tr>
    <td>order ID</td>
    <td>Date</td>
    <td>Status</td>
  </tr>
<?php
while (    $rs=mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $rs['ordID'] . "</td>";
    echo "<td>{$rs['orderDate']}</td>";
    echo "<td>" , $rs['status'], "</td>";
    //echo "<td><a href='addToCart.php?prdID='" . $rs['prdID'] . "'>Add</a></td>";
    echo "</tr>";
}
?>
</table>
<a href="main.php">OK</a><hr>

</body>
</html>
