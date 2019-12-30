<?php
session_start();
require "prdModel.php";

//check whether the user has logged in or not
if (! isset($_SESSION["loginProfile"])) {
    //if not logged in, redirect page to loginUI.php
    header("Location: loginUI.php");
}
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
<body>
<div class="wrapper">
<h2>This is the Product Management page</h2> 
[<a href="logout.php">logout</a>] [<a href="admin.php">Admin Main Page</a>]

</p>
<hr>
<?php
    echo "Hello ", $_SESSION["loginProfile"]["uName"],
    ", Your ID is: ", $_SESSION["loginProfile"]["uID"],
    ", Your Role is: ", $_SESSION["loginProfile"]["uRole"],"<HR>";
    $result=getPrdList();
?>
<hr>
    <table width="350px" border="1">
  <tr>
    <td>id</td>
    <td>name</td>
    <td>price</td>
    <td>+</td>
  </tr>
<?php
while ($rs=mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $rs['prdID'] . "</td>";
    echo "<td>{$rs['name']}</td>";
    echo "<td>" , $rs['price'], "</td>";
    echo "<td><a href='prd.editUI.php?id=" , $rs['prdID'] , "'>Edit</a> --";
    echo "<a href='prd.del.php?id=" , $rs['prdID'] , "' onclick='return confirm(\"Sure?\")'>Del</a></td></tr>";
}
?>
</table>
<a href="prd.editUI.php?id=-1">Add New Product</a><hr>
</div>
</body>
</html>
