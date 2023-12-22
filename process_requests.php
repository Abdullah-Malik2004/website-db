<?php
include('database.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sellerid = $_POST['request_id'];
    $action = $_POST['action'];
    echo $action;

    // Update the status of the current request based on the selected action
    $stmt = $conn->prepare("UPDATE seller SET status = ? WHERE sellerid = ?");
    $stmt->bind_param("si", $action, $sellerid);
    $stmt->execute();
    $stmt->close();
    

    header("Location: AdminReq.php"); // Redirect back to the admin screen
    //exit();
}
?>