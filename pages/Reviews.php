<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reviews.css">
    <title>Reviews</title>
</head>

<?php
$sql = "SELECT * FROM users;";
$result = mysqli_query($webstoreDB, $sql);
$resultCheck = mysqli_num_rows($result);
$datas  = array();

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
    }
}

//Validate Form Data with PHP
//remove backslashes (\)
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<body>
    <div class="header1">
        <a href="../index.php">
            <img src="../images/icons/backIcon.jpg" alt="" width="30" height="30">
            Back to home
        </a>
    </div>

    <div class="addReview">

        <?php
        if (isset($_SESSION['email'])) {

            echo "<form method=\"post\" action=\"Reviews.php\">
            <div class=\"singleReview\"> 
            <h2>Add a review!</h2>
                
                <label for=\"review\"><b>Review</b></label>
                <textarea rows=\"5\" placeholder=\"Enter your review here\" name=\"review\" id=\"review\" style=\"cursor:pointer; resize: none;\"></textarea>
                
                <button type=\"submit\" class=\"addReview\" name=\"addReview\">Add Review</button></form>";

            if (!empty($_POST['review'])) {
                $review = test_input($_POST['review']);
                $email = $_SESSION['email'];
                $sql = "UPDATE users SET review = '$review' WHERE email='$email'";
                mysqli_query($webstoreDB, $sql);
            }

            // refresh the page after adding reiew
            if (isset($_POST["addReview"])) {
                header("Refresh: 1");
            }
        } else {
            echo "<div class=\"singleReview\">If you want to add a review,  <a href=\"../pages/Login.php\"> Login here</a></div>";
        }
        ?>
    </div>

    <div class="header">
        <h1>Customers's reviews</h1>
    </div>

    <div class="reviews">

        <?php
        $count = 0;
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }


        foreach ($datas as $data) {
            $email = $data['email'];
            $review = $data['review'];

            if (!empty($review)) {
                $count++;
                echo "<div class=\"singleReview\">
                <label for=\"username\"><b>Email</b></label>
                <input readonly type=\"text\" placeholder=\"Enter Name\" name=\"username\" required value=$email style=\"cursor: not-allowed;\">
                <label for=\"review\"><b>Review</b></label>
                <textarea readonly rows=\"5\" style=\"cursor: not-allowed;\">$review</textarea>
            </div>";
            } else if (empty($review) && ($count <= 0)) {
                echo "<div class=\"singleReview\">
              <p> No reviews yet! </p>
            </div>";
                exit;
            }
        } ?>

    </div>

</body>

</html>