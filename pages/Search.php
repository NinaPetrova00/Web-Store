<?php include('server.php');
// Not working

$sql = "SELECT * FROM vegetables ";
$sql2 = "SELECT * FROM fruits ";

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
?>