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

    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <style>
        * {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        body
        {
            background-color: #8490dd;
        }

/*
        table 
        {
            width: 70%;
            border-collapse: collapse;
            margin-top: 20px;
            align: center;
        }
        

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            font-weight: bold;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            margin-right: 10px;
        }
*/

        .styled-table 
        {
            border-collapse: collapse;
            margin: 100px auto;
            font-size: 23px;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        
        .styled-table thead tr 
        {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td 
        {
            padding: 12px 15px;
        }

        .styled-table tbody tr 
        {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) 
        {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        input[type="submit"] 
        {
            display: block;
            margin: 0 auto;
            font-size: 27px;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .radio-btn input[type="radio"] 
        {
            transform: scale(1.5); /* Adjust the scale factor as needed */
            margin-right: 5px; /* Add some spacing between the circle and the label */
        }
        p
        {
            text-align: center;
            margin-top: 300px;
            font-size: 26px;
            font-weight: 550;
        }
    </style>
</head>
<body>

<a href="main.php">
    <div class = 'logobar'>
        <div class="logo-cover border_logo">
            <div class="logo"></div>
        </div>
    </div>
    
</a>

<?php
$query = "SELECT * FROM seller WHERE status = 'pending'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    echo '<form method="post" action="process_requests.php">';
    echo '<table class="styled-table">';

    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Phone Number</th>';
    echo '<th>Type</th>';
    echo '<th>Bussiness Name</th>';
    echo '<th>CNIC</th>';
    //echo '<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Status</th>';
    echo '</tr>';

    $attributes = ['fname', 'email', 'phoneno', 'business_Type', 'business_name', 'CNIC'];

    // Loop through each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        
        // Loop through each attribute
        foreach ($attributes as $attribute) 
        {
            echo '<td>';
            
            // Print the full name if attribute is 'fname'
            if ($attribute == 'fname') 
                echo $row[strtolower(str_replace(' ', '', 'fname'))] . ' ' . $row[strtolower(str_replace(' ', '', 'lname'))];
            else 
                echo $row[strtolower(str_replace(' ', '_', $attribute))] ?? ''; // Use the null coalescing operator to handle undefined keys
            

            echo '</td>';
        }

        // Display radio buttons, hidden inputs, etc. here
        echo '<td>';
        echo '<label class="radio-btn"> ';
        echo '<input type="radio" name="action" value="approved'.$row['SellerID'].'"> Approve';
        echo '</label>';
        echo '</td>';
        echo '<td style="padding-left: 10px;">'; // Adjust the value as needed
        echo '<label class="radio-btn">';
        echo '<input type="radio" name="action" value="declined'.$row['SellerID'].'"> Decline';
        //echo '<input type="hidden" name="request_id" value="' . $row['SellerID'] . '">';
        echo '</label>';
        echo '</td>';

        echo '</tr>';
    }

    echo '</table>';
    echo '<input type="submit" value="Submit">';
    echo '</form>';
    } 
    else 
        echo '<p>No pending requests.</p>';

?>

</body>
</html>