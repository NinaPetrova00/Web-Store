<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/details.css">
    <title>Delete</title>
</head>

<?php
// show database data on a website
$id = $_REQUEST['id'];

if ($id <= 10) {
    // Fruits
    $sql = "SELECT * FROM fruits WHERE id=$id";
    $result = mysqli_query($webstoreDB, $sql);
    //$resultCheck = mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo "Not existing";
        exit;
    }
    $prodName =  $row['name'];
    $prodImg = strval($row['image']);
    $price = $row['price'];
    $quantity = 1;
} else {
    // Vegetables
    $sql = "SELECT * FROM vegetables WHERE id=$id";
    $result = mysqli_query($webstoreDB, $sql);
    //$resultCheck = mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo "Not existing";
        exit;
    }
    $prodName =  $row['name'];
    $prodImg = strval($row['image']);
    $price = $row['price'];
    $quantity = 1;
}

?>

<body>
    <div class="header1">
        <a href="./Cart.php">
            <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
            Back to cart
        </a>
    </div>

    <form method="post">
        <h1>Are you sure you want to delete this product?</h1>
        <div class="productDetails">
            <h1><?php echo $prodName; ?></h1>
            <img src="<?php echo $prodImg; ?>">
            <h3>Origin: <?php echo $row['origin']; ?></h3>
            <h3>About this product:</h3>
            <p><?php echo $row['about']; ?></p>

            <?php
            echo "<a href=\"Cart.php\">
            <div class=\"buttons\">
                <input type=\"submit\" value=\"Delete\" name=\"del\" class=\"del\"><br/><br/>
                <input type=\"submit\" value=\"Cancel\" name=\"cncl\" class=\"cncl\"><br/><br/>
            </div>";

            if (isset($_POST["del"])) {
                $checkDB = "SELECT * FROM cart WHERE productID = '$id'";
                $resultDB = mysqli_query($webstoreDB, $checkDB);
                if (mysqli_num_rows($resultDB) > 0) {
                    echo 'found!';
                    $sql = "DELETE FROM `cart` WHERE `productID`=" . $id . "";
                    mysqli_query($webstoreDB, $sql);
                }
                "</a>";
                header("Location: ./Cart.php");
            } elseif (isset($_POST["cncl"])) {
                header("Location: ./Cart.php");
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