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
    <style>
        
        table {
            width: 30%;
            border-collapse: collapse;
            margin-top: 20px;
            align: center;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        td:first-child {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php
    

    $query = "SELECT * FROM seller WHERE status = 'pending'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        echo '<form method="post" action="process_requests.php">';
        echo '<table>';
        echo '<tr>';
        
        echo '<th>Seller Request</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Name</td>';
        echo '<td>' . $row['fname'] . ' ' . $row['lname'] . '</td>';
        echo '</tr>';
        echo '</table>';
        echo '<div>';
        echo '<label>';
        echo '<input type="radio" name="action" value="approved"> Approve';
        echo '</label>';
        echo '</div>';
        echo '<div>';
        echo '<label>';
        echo '<input type="radio" name="action" value="declined"> Decline';
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


