<?php
    include('database.php');
    session_start(); 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productid = $_POST['action'];
        $customerid = $_SESSION['cid'];

        $sql = "INSERT into cart values($customerid,$productid,1)";
        $result = mysqli_query($conn,$sql);

        if($result){
            
            mysqli_query($conn, $sql);
            //sendemail_verify("$fname","$lname","$email","$verify_token");
            echo "<script>
             alert('Added to cart succesfully!')
              </script>";
           
        }
        else{
            
            echo "<script>
            alert('Already added to cart')
            </script>";
            
        }

        header("location: games.php?page=1");
        exit();
        
        
    }
?>