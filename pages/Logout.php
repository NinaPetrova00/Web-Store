<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/logout.css">
    <title>Logout</title>
</head>

<body>

    <div class="header">
        <a href="../index.php">
            <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
            Back to home
        </a>
    </div>

    <form action="Logout.php" method="post">
        <div class="imgcontainer">
            <img src="../images/icons/logout.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <?php if (isset($_SESSION['email'])) {
                echo " <p>
                Do you want to loggout as
                        <strong>";
                echo $_SESSION['email'];
                echo " ? </strong>
                </p>
                <div class=\"clearfix\">
                <button type=\"submit\" class=\"logoutBtn\" name=\"logout\">Logout</button>
                <a href=\"../index.php\" class=\"cancelBtn\" name=\"cancel\">Cancel</a>
            </div>";
            } else {
                echo "<p> <strong style=\"font-size:24px\"> You are already logged out! </strong> </p>";
            }
            ?>
        </div>
    </form>
</body>

</html>