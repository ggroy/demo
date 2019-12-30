<?php
session_start();
// $_SESSION['loginProfile'] = null;
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log Out</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: auto; }
    </style>
</head>
<body>
<div class="wrapper">
    <h3>You logged out!</h3>
    <h4>Going to login page...</h4>
</div>
<hr>
<?php  header("refresh:1;url=loginUI.php")     ?>

</body>
</html>
