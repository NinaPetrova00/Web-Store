<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/checkout.css">
    <title>AboutUs</title>
</head>

<!-- after logout clear cart -->
<?php
$sql = "DELETE FROM cart";
$result = mysqli_query($webstoreDB, $sql);
?>

<body>
    <div class="main">
        <h2>Your order has been processed sucessfully! Please check your email to get your order confirmation and shipping details!</h2>
    </div>
</body>



</html>