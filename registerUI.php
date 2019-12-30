<?php
session_start();

$uID_err = $name_err = $PWD_err = $confirm_PWD_err = '';

if (!empty($_SESSION)) {
    $uID_err = $_SESSION['uID_err'];
    $name_err = $_SESSION['name_err'];
    $PWD_err = $_SESSION['PWD_err'];
    $confirm_PWD_err = $_SESSION['confirm_PWD_err'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: auto; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="registerControl.php" method="POST">
            <div class="form-group <?php echo (!empty($uID_err)) ? 'has-error' : ''; ?>">
                <label>User ID</label>
                <input type="text" name="uID" class="form-control">
                <span class="help-block"><?php echo $uID_err; ?></span><!---->
            </div>
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($PWD_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="PWD" class="form-control">
                <span class="help-block"><?php echo $PWD_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_PWD_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_PWD" class="form-control">
                <span class="help-block"><?php echo $confirm_PWD_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="loginUI.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>