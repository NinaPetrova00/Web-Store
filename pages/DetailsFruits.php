<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/details.css">
    <title>Details</title>
</head>

<?php
// show database data on a website
$id = (int) $_REQUEST['id']; // productID
$id = $_REQUEST['id']; // productID
$sql = "SELECT * FROM fruits WHERE id=$id";
$result = mysqli_query($webstoreDB, $sql);

$row = mysqli_fetch_assoc($result);
if (!$row) {
    echo "Not existing";
    exit;
}

$prodName = $row['name'];
$prodImg = strval($row['image']);
$price = $row['price'];
$prodQuantity = 1;

// Get user email and id
if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];
    $userID = null;

    $sql2 = "SELECT id FROM users WHERE email='$userEmail'";
    $result2 = mysqli_query($webstoreDB, $sql2);

    // Get userID
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $userID = $row2["id"];
    }
}
?>

<body>
    <div class="header">
        <a href="./Fruits.php">
            <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
            Back to shop fruits
        </a>
    </div>

    <form method="post">
        <div class="productDetails">
            <h1><?php echo $prodName; ?></h1>
            <img src="<?php echo $prodImg; ?>">
            <h3>Origin: <?php echo $row['origin']; ?></h3>
            <h3>About this product: <?php echo $row['about']; ?></h3>

            <?php
            if (isset($_SESSION['email'])) {
                $checkDB = "SELECT * FROM cart WHERE productID = '$id' AND userID ='$userID'";
                $resultDB = mysqli_query($webstoreDB, $checkDB);

                //check if product is already added in the cart
                if (mysqli_num_rows($resultDB) > 0) {
                    echo "<div class=\"addedProduct\"><h3>You have added this product in your cart already!</h3></div>";
                } else {
                    echo "<form method=\"post\">
            <select name=\"option[]\">
                <option value=\"1\">1</option>
                <option value=\"2\">2</option>
                <option value=\"3\">3</option>
                <option value=\"4\">4</option>
                <option value=\"5\">5</option>
                <option value=\"6\">6</option>
                <option value=\"7\">7</option>
                <option value=\"8\">8</option>
                <option value=\"9\">9</option>
                <option value=\"10\">10</option>
            </select>

                <input type='submit' name='submit' class='selectInput' value=\"Select quantity\">";

                    // Check if form is submitted successfully - if option is choosen
                    if (isset($_POST['option'])) {
                        //Retrieving each selected option
                        foreach ($_POST['option'] as $option) {
                            $newQuantity = intval($option);
                            echo "<h1> You selected $newQuantity of this product!</h1>";
                            continue;
                        }
                    }
                    echo "</form>";

                    echo "<a href=\"Cart.php\">
                <p class=\"buyNowBtn\">Buy now</p>";
                    //  <input type=\"submit\" value=\"Buy now\" name=\"buyNowBtn\" class=\"buyNowBtn\">";

                    if (isset($newQuantity)) {
                        $sql = "INSERT INTO cart (userID,productID,productName, productImage, productPrice, productQuantity) VALUES ('$userID', '$id', '$prodName', '$prodImg', ' $price', '$newQuantity')";
                        mysqli_query($webstoreDB, $sql);
                    }
                }

                // is button buy now clicked
                if (isset($_POST["buyNowBtn"])) {
                    header("Location: ./Cart.php");
                }

                "</a>";
            } else {
                echo "<div class=\"addedProduct\"><h3>To shop, please <a href=\"Login.php\"</a> login first!</h3></div>";
            }
            ?>
            </a>
        </div>
        <?php
        foreach ($row as $key => $value) {
            if ($key == "id" || $key == "name" || $key == "image") {
                continue;
            }
            switch ($key) {
                case "id":
                    $key = "ID";
                    break;
                case "name":
                    $key = "Name";
                    break;
                case "image":
                    $key = "Image";
                    break;
            }
        }
        ?>

    </form>
</body>

</html>