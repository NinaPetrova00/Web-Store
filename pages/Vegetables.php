<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vegetables.css">
    <title>Vegetables</title>
</head>

<body>
    <div class="header">
        <a href="../index.php">
            <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
            Back to home
        </a>
        <h1>Vegetables</h1>
    </div>

    <?php
    // show database data on a website

    $sql = "SELECT * FROM vegetables;";
    $result = mysqli_query($webstoreDB, $sql);
    $resultCheck = mysqli_num_rows($result);
    $datas  = array();

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
    }
    function is_decimal($n)
    {
        // Note that floor returns a float 
        return is_numeric($n) && floor($n) != $n;
    };

    ?>
    <form method="post" action="DetailsVegetables.php">
        <div class="products">
            <?php foreach ($datas as $data) {
                $name = $data['name'];
                $price = $data['price'];
                $image = $data['image'];
                $id = $data['id'];

                if (is_decimal($price)) {
                    $price = number_format($price, 2);
                }
                $priceConverted = number_format($price, 2, ",", ".");
                echo "<div class=\"singleProduct\"><img src=\"$image\"><h3>$name</h3> <h3>Price: $priceConverted lv.</h3><a href=\"DetailsVegetables.php?id=$id \"><p class=\"details\">Details</p></a></div>";
            } ?>
        </div>
    </form>
</body>

</html>