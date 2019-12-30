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
<h2>This is the Edit Product page</h2>
[<a href="logout.php">logout</a>]
<hr>
<?php
    echo "Hello ", $_SESSION["loginProfile"]["uName"],
    ", Your ID is: ", $_SESSION["loginProfile"]["uID"],
    ", Your Role is: ", $_SESSION["loginProfile"]["uRole"],"<HR>";

    $prdID=(int)$_GET['id'];
    $rs=null;
if ($result=getPrdDetail($prdID)) {
    $rs=mysqli_fetch_assoc($result);
}
if (! $rs) {
    $rs['prdID']=-1;
    $rs['name']='';
    $rs['price']=0;
    $rs['detail']='';
}

?>
<form action="prd.update.php" method="POST">
    <table width="350" border="1" class="wrapper">
  <tr>
    <td>id: <input type="hidden" name="pID" value="<?php echo htmlspecialchars($rs['prdID']);?>"></td></tr>
    <tr><td>name:<input type="text" name="name" value="<?php echo htmlspecialchars($rs['name']);?>"></td></tr>
    <tr><td>price:<input type="text" name="price" value="<?php echo htmlspecialchars($rs['price']);?>"></td></tr>
    <tr><td>detail:<input type="text" name="detail" value="<?php echo htmlspecialchars($rs['detail']);?>"></td></tr>
<tr><td><input type="submit"></td></tr>
</form>

</table>
<a href="prdMain.php">back</a><hr>
</div>
</body>
</html>
