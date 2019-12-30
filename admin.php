<?php
require "utils.php";
chkAccess(9, "main.php");
require "orderModel.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic HTML Examples</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: auto; }
    </style>
</head>
<body class="wrapper">
<h2>This is the Admin page</h2> 
[<a href="logout.php">logout</a>] [<a href="prdMain.php">Product Management</a>]

</p>
<hr>
<?php
    echo "Hello ", $_SESSION["loginProfile"]["uName"],
    ", Your ID is: ", $_SESSION["loginProfile"]["uID"],
    ", Your Role is: ", $_SESSION["loginProfile"]["uRole"],"<HR>";
    $result=getConfirmedOrderList();
?>
    <table width="350" border="1">
  <tr>
    <td>id</td>
    <td>name</td>
    <td>date</td>
    <td>+</td>
  </tr>
<?php
while ($rs=mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $rs['ordID'] . "</td>";
    echo "<td>{$rs['uID']}</td>";
    echo "<td>" , $rs['orderDate'], "</td>";
    echo "<td><a href='order.showDetail.php?ID=" , $rs['ordID'] , "'>ShowDetail</a></td></tr>";
}
?>
</table>
</body>
</html>
