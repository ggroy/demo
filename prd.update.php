<?php
session_start();
//check whether the user has logged in or not
if (! isset($_SESSION["loginProfile"])) {
    //if not logged in, redirect page to loginUI.php
    header("Location: loginUI.php");
}
require "prdModel.php";
$prdID=(int)$_POST['pID'];

if ($prdID==0) {
    echo "Invalid Parameters!!";
} else {
    $prdDetail=array('prdID' => $prdID, 'name' => $_POST['name'],
        'price' => (int)$_POST['price'],'detail' => $_POST['detail']);

    if ($prdID>0) {
        updateProduct($prdID, $prdDetail);
    } else {
        addProduct($prdDetail);
    }

    echo "Data Saved<br>";
}
?>
<a href="prdMain.php">Back</a>
