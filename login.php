<?php  include('server.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register Using PHP & MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Log in</h2>
    </div>

    <form method="post" action="login.php">
    <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username...">
        </div>


        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password...">
        </div>

        <div class="input-group">
            <button type="submit" name="login" class="buton" >Log in</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign Up</a>
        </p>
        
    </form>
</body>
</html>