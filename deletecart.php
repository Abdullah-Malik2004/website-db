<?php
    include('database.php');
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $cartid=$_POST['id'];
        $cid=$_SESSION['cid'];
        $sql = "DELETE FROM cart where CustomerID = ? AND ProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii",$cid,$cartid);
        $stmt->execute();
        $stmt->close();
        header("location:cart.php");
        exit();
    }
?>