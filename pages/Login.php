<?php
include('server.php');
include('errors.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="header">
        <a href="../index.php">
            <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
            Back to home
        </a>
    </div>

    <form action="Login.php" method="post">

        <div class="imgcontainer">
            <img src="../images/icons/loginIcon.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <?php
            if (!isset($_SESSION['email'])) {
                echo "
                <label for=\"email\"><b>Email</b></label>
                <input type=\"text\" placeholder=\"Enter Email\" name=\"email\" required value=\"$email\">
    
                <label for=\"password\"><b>Password</b></label>
                <input type=\"password\" placeholder=\"Enter Password\" name=\"password\" required value=\"$password\">
    
                <p>
                    Don't have an account?
                    <a href=\"../pages/SignUp.php\">Sign up here</a>
                </p>
    
                <div class=\"clearfix\">
                    <button type=\"submit\" class=\"loginbtn\" name=\"login\">Login</button>
                </div>
                ";
            } else {
                echo "<p> <strong style=\"font-size:20px\"> To login with other account, first <a href=\"../pages/Logout.php\">logout</a>! </strong> </p>";
            }
            ?>

        </div>
    </form>
</body>

</html>