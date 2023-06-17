<?php
session_start();

// initializing variables
$username = null;
$email    = null;
$password = null;
$repeatPassword = null;
$errors = [];
$review = null;

// fruits and vegetables variables
$id = null;
$name = null;
$price = null;
$image = null;
$origin = null;
$about = null;

// cart
$productID = null;
$productName = null;
$productPrice = null;
$productQuantity = null;

// connect to the database
$webstoreDB = mysqli_connect('localhost', 'root', '', 'webstore', 3307);

// SIGN UP/REGISTER USER
if (isset($_POST['signUp'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($webstoreDB, $_POST['username']);
    $email = mysqli_real_escape_string($webstoreDB, $_POST['email']);
    $password = mysqli_real_escape_string($webstoreDB, $_POST['password']);
    $repeatPassword = $_POST['repeatPassword'];

    // form validation: ensure that the form is correctly filled ...
    if (empty($username)) {
        $errors[] = "Name is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // first check the database to make sure 
    // a user does not already exist with the same username  and/or email
    $user_check_query = "SELECT * FROM users WHERE  email='$email'";
    $result = mysqli_query($webstoreDB, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    // if user exists
    if ($user) {
        if ($user['email'] === $email) {
            $errors[] = "You already have an account!";
        }
    }

    //check if both passwords match
    if ($password != $repeatPassword) {
        $errors[] = "Passwords do not match!";
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username','$email','$password')";
        mysqli_query($webstoreDB, $query);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Successful registration!";
        header("Location: ../index.php");
    }
}

// LOGIN
if (isset($_POST['login'])) {
    // receive all input values from the form

    $email = mysqli_real_escape_string($webstoreDB, $_POST['email']);
    $password = mysqli_real_escape_string($webstoreDB, $_POST['password']);

    // form validation: ensure that the form is correctly filled ...
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // first check the database to make sure 
    // a user does not already exist with the same password and/or email
    $user_check_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($webstoreDB, $user_check_query);
    $user = mysqli_fetch_assoc($result);  //fetches a result row as an associative array.

    //if user exists
    if ($user) {
        echo $email . "<br>";
        echo $user['email'] . "<br>";
    } else {
        $errors[] = "User does not exists";
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header("Location: ../index.php");
    }
}

// LOGOUT
if (isset($_POST['logout'])) {
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    session_destroy();
    echo "Successfully logged out!";
    header("Location: ../index.php");
}
