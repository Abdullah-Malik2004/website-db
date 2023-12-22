<?php
    include('database.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Account Requests</title>
</head>
<body>

    <?php
    

    $query = "SELECT * FROM seller WHERE status = 'pending'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        echo '<form method="post" action="process_requests.php">';
        echo '<div>';
        echo '<label>';
        echo '<input type="radio" name="action" value="approved"> Approve: ' . $row['fname']. ' ' . $row['lname'];
        echo '</label>';
        echo '</div>';
        echo '<div>';
        echo '<label>';
        echo '<input type="radio" name="action" value="declined"> Decline: ' . $row['fname']. ' ' . $row['lname'];
        echo '</label>';
        echo '</div>';
        echo '<input type="hidden" name="request_id" value="' . $row['SellerID'] . '">';
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    } else {
        echo '<p>No pending requests.</p>';
    }
    ?>

</body>
</html>


