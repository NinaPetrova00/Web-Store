<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Shopping Cart</title>
</head>

<?php

// Get user email and id
if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];
    $userID = null;

    $sql2 = "SELECT `id` FROM `users` WHERE `email`='" . $userEmail . "'";
    $result2 = mysqli_query($webstoreDB, $sql2);

    // Get userID
    while ($row = mysqli_fetch_assoc($result2)) {
        $userID = $row["id"];
    }

    // show database data on a website
    $sql = "SELECT * FROM cart WHERE userID='$userID'";
    $result = mysqli_query($webstoreDB, $sql);
    // $row = mysqli_fetch_assoc($result);
    $datas = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
    }
    $totalPrice = 0;
}
?>

<body>
    <div class="header1">
        <a href="../index.php">
            <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
            Back to home
        </a>
    </div>

    <?php
    if (!isset($_SESSION['email'])) {
        echo "<div class=\"condition\"><h3>If you want to add to shop, <a href=\"../pages/Login.php\"> Login here</a></h3></div>";
    } else {
        // Check if cart is empty
        if (!empty($datas)) {
            echo "<form method=\"post\" action=\"Cart.php\">
            <div class=\"cartContainer\">
                <div class=\"header\">
                    <img src=\"../images/icons/cart.jpg\" style=\"width: 45px; height: 45px;\">
                </div>";


            foreach ($datas as $data) {
                $id = intval($data['productID']);
                $img = $data['productImage'];
                $name = $data['productName'];
                $price = $data['productPrice'];
                $productQuantity = $data['productQuantity'];
                echo "<div class=\"cartItems\">
                    <div class=\"image-box\">
                        <img src=\"$img\">
                    </div>
        
                    <div class=\"about\">
                        <h1 class=\"title\">
                            $name
                        </h1>
                    </div>
        
                    <div class=\"about\">
                        <h3 class=\"title\">
                            Qunatity:
                            $productQuantity
                        </h3>
                    </div>";

                $newPrice = $price * $data['productQuantity'];
                $totalPrice = $totalPrice + $newPrice;

                // change . with ,
                $newPriceConverted = number_format($newPrice, 2, ",", ".");
                $newTotalPriceConverted = number_format($totalPrice, 2, ",", ".");

                echo "<div class=\"about\"> $newPriceConverted lv.
        
                    </div>
                    <div class=\"del\">
                        <a href=\"DeleteProduct.php?id=$id \">
                            <p class=\"delete\">Delete";
                echo "</p>
                        </a>
                    </div>";
                echo "</a>
                </form>
                </div>
                <hr>
                </hr>";
                // closing bracket foreach loop
            }

            echo "<div class=\"checkout\">
              <div class=\"total\"> Total: $newTotalPriceConverted  lv.</div>
              <div class=\"check\">
                  <a href=\"./Checkout.php\" class=\"button\">Checkout</a>
              </div>
          </div>
        </form>";
        } else {
            echo "<div class=\"singleReview\">
            <h4>Your cart is empty! </h4>

            <div id=\"fruitsVeggies\">
                <h4><a href=\"../pages/Fruits.php\">
                        <img class=\"smallIcon\" src=\"../images/icons/fruitsIcon.jpg\" alt=\"Fruits\" style=\"width: 33px; height: 33px;\">
                        Shop fruits</a></h4>
            </div>

            <div id=\"fruitsVeggies\">
                <h4><a href=\"../pages/Vegetables.php\">
                        <img class=\"smallIcon\" src=\"../images/icons/vegetablesIcon.jpg\" alt=\"Vegetables\" style=\"width: 40px; height: 40px;\">
                        Shop vegetables</a></h4>
            </div>

          </div>";
            // exit;
        }
        // closing bracket else
    }
    ?>

</body>

</html>