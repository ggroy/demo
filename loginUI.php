<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: auto;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login </h2>
        <form method="post" action="loginControl.php">
            <div class="form-group">
                <label>ID</label>
                <input type="text" name="ID" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="PWD" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Don't have an account yet? <a href="registerUI.php">Register here</a>.</p>
        </form>
    </div>
</body>
</html>
