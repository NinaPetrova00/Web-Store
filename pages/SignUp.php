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
  <link rel="stylesheet" href="../css/signUp.css">
  <title>Sign Up</title>
</head>

<body>
  <div class="header">
    <a href="../index.php">
      <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
      Back to home
    </a>
  </div>

  <form action="SignUp.php" method="post">
    <div class="imgcontainer">
      <img src="../images/icons/signUp.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">

      <?php
      if (!isset($_SESSION['email'])) {
        echo "
        <label for=\"username\"><b>Name</b></label>
        <input type=\"text\" placeholder=\"Enter Name\" name=\"username\" required value=\"$username\">
  
        <label for=\"email\"><b>Email</b></label>
        <input type=\"text\" placeholder=\"Enter Email\" name=\"email\" required value=\"$email\">
  
        <label for=\"password\"><b>Password</b></label>
        <input type=\"password\" placeholder=\"Enter Password\" name=\"password\" required value=\"$password\">
  
        <label for=\"repeatPassword\"><b>Repeat Password</b></label>
        <input type=\"password\" placeholder=\"Repeat Password\" name=\"repeatPassword\" required value=\"$repeatPassword\">
  
        <p>By creating an account you agree to our Terms & Privacy.</p>
  
        <div class=\"clearfix\">
          <!-- <button type=\"button\" class=\"cancelbtn\">Cancel</button> -->
          <button type=\"submit\" class=\"signupbtn\" name=\"signUp\">Sign Up</button>
        </div>
        ";
      } else {
        echo "<p> <strong style=\"font-size:20px\"> To create new account, first <a href=\"../pages/Logout.php\">logout</a>! </strong> </p>";
      }
      ?>

    </div>
  </form>
</body>

</html>

</html>