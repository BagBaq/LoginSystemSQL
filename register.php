<?php include('server.php');


?>


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
        <h2>Register</h2>
    </div>
    


    <form method="post" action="register.php">

    <?php include('errors.php');?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username..." value="<?php echo $username; ?>">
        </div>


        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" placeholder="Password...">
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2" placeholder="Confirm Password...">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Mail Adress..." value="<?php echo $email; ?>">
        </div>

        <div class="input-group">
            <button type="submit" name="register" class="buton" >Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign In</a>
        </p>
    </form>
</body>
</html>