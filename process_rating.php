<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $rating = isset($_POST['selectedRating']) ? $_POST['selectedRating'] : '';
    $orderid = $_POST['order_id'];

    echo $rating;
    echo $orderid;

    $sql = "UPDATE orders set rating = $rating
    where orderid = $orderid";

    mysqli_query($conn,$sql);
    
    header("location:tobereviewed.php");
    // Perform other actions with the rating here
    echo "L";
} else {
    // Handle cases where the script is accessed without a POST request
    echo "Invalid request method.";
}

?>
