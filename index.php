<?php include('./pages/server.php') ?>

<!DOCTYPE html>
<html lang="en">
<!-- http://localhost/web-store/ -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>WebStore</title>
</head>

<?php
if (isset($_SESSION['email'])) {
    echo " <p>
    Welcome,
    <strong>";
    echo $_SESSION['email'];
    echo "</strong> !
</p>";}
?>

<body>
    <!-- bootstrap -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="margin-right:45px">
                        <a class="nav-link active" aria-current="page" href="#">
                            <img src="./images/icons/homeIcon.png" alt="Home" width="30" height="24" class="d-inline-block align-text-top">
                            Home</a>
                    </li>
                    <li class="nav-item" style="margin-right:45px">
                        <a class="nav-link" href="./pages/AboutUs.html">About Us</a>
                    </li>
                    <li class="nav-item" style="margin-right:45px">
                        <a class="nav-link" href="./pages/Contacts.html">Contacts</a>
                    </li>
                    <li class="nav-item" style="margin-right:45px">
                        <a class="nav-link" href="./pages/Reviews.php">Reviews</a>
                    </li>
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown" style="margin-right:45px">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Shop
                            </a>
                            <ul class="dropdown-menu">
                                <li>

                                    <a class="dropdown-item" href="./pages/Fruits.php">
                                        Fruits
                                        <img src="./images/icons/fruitsIcon.jpg" alt="" style="width:20px; height: 20px;">
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./pages/Vegetables.php">Vegetables
                                        <img class="smallIcon" src="./images/icons/vegetablesIcon.jpg" alt="Vegetables" style="width: 25px; height: 25px;">
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="margin-right:45px">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./pages/SignUp.php">Sign up</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./pages/Login.php">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./pages/Logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>
            </div>
            <form class="d-flex" role="search" style="margin-right: 50px;" method="GET" action="Search.php">
                <input class="form-control me-2" type="search" placeholder="What are you looking for?" aria-label="Search" style="width: 240px;">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class="nav-link" href="./pages/Cart.php">
                <img src="./images/icons/cart.jpg" alt="Cart" style="width: 35px; height: 35px;">
                Cart
            </a>

        </div>
    </nav>

    <div class="header">
        <h1>Welcome to Nature's essentials!</h1>
        <h2>Fruits & vegetables supermarket!</h2>
        <img src="./images/homeImages/background.jpg" alt="">
    </div>

    <!-- <div class="fruits-veggies">
        <div class="column">
            <h4><a href="./pages/Fruits.php">
                    <img class="smallIcon" src="./images/icons/fruitsIcon.jpg" alt="Fruits" style="width: 33px; height: 33px;">
                    Shop fruits
                </a></h4>
            <img src="./images/homeImages/fruit2.jpg" alt="">
        </div>

        <div class="column">
            <h4><a href="./pages/Vegetables.php">
                    <img class="smallIcon" src="./images/icons/vegetablesIcon.jpg" alt="Vegetables" style="width: 40px; height: 40px;">
                    Shop vegetables</a></h4>
            <img src="./images/homeImages/vegetables.jpg" alt="">
        </div>
    </div> -->

    <div class="footer">
        All rights reserved ©2023
    </div>
</body>


</html>