<?php
    include('database.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $couponid = $_POST['coupon_id'];
        echo $couponid;
        $cid = $_SESSION['cid'];
        $stmt = $conn->prepare("SELECT price from coupon where couponid = ?");
        $stmt->bind_param("i",$couponid);
        $stmt->execute();
        $stmt->bind_result($price);
        $stmt->fetch();
        $stmt->close();
        $stmt = $conn->prepare("SELECT cosmopoints from customer where customerid = ?");
        $stmt->bind_param("i",$_SESSION['cid']);
        $stmt->execute();
        $stmt->bind_result($cpoints);
        $stmt->fetch();
        $stmt->close();
        echo $price;
        if($price>$cpoints){
            echo"<script>
            alert('You dont have enough CosmoPoints')
            window.location.href='getcoupons.php'
            </script>";
            
        }
        else{
            $sql = "INSERT INTO customercoupon values ($cid,$couponid)";
            $result = mysqli_query($conn,$sql);
            if($result){
                $sql = "UPDATE customer set cosmopoints = cosmopoints - $price
                where customerid = $cid";
                $result2 = mysqli_query($conn,$sql);

                echo"<script>
                alert('Congratulations! You now own this coupon')
                window.location.href='getcoupons.php'
                </script>";
            }
            else{
                
                echo"<script>
                alert('You already own this coupon.')
                window.location.href='getcoupons.php'
                </script>";
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-GAMES</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="categoryCss/games.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="newGames.js">
    </script>

</head>
<body class="body">
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>
        
    <script>
    </script>

    <hr>
    <h1>COUPONS</h1>
    <hr>

    <?php
        $stmt = $conn->prepare("SELECT cosmopoints from customer where customerid = ?");
        $stmt->bind_param("i",$_SESSION['cid']);
        $stmt->execute();
        $stmt->bind_result($cpoints);
        $stmt->fetch();
        $stmt->close();
        $sql = "SELECT * from coupon";
        $result = mysqli_query($conn,$sql);
        echo'You have '.$cpoints.' CosmoPoints';
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo '<form id="AddToCartForm' . $row['CouponID'] . '" method="post" action="getcoupons.php">';
                echo '<div class="assissin" id="assissin">';
                echo '<img src="' . $row["image_data"] . '" class="im" style="width: 680px;  height: 372px;">';
                echo '<div class="textcontainer" id="' . $row['CouponID'] . '">';
                echo '<div class="cc">';
                echo '<input type="hidden" name="coupon_id" value="' . $row['CouponID'] . '">';
                echo '<input type="submit" name="action" value="Buy Coupon">';
                echo '</div>';
                echo '</div>';
                echo '<div class="price">';
                echo '<h4><br> ' . $row["price"] . ' CosmoPoints</h4>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
            }
        }
    ?>
    <style>


/* line114 to 124 removes the arrows on the in side of 
quntity box*/

.quantity::-webkit-inner-spin-button,
.quantity::-webkit-outer-spin-button 
{
    -webkit-appearance: none;
    margin: 0;
}

.quantity 
{
    -moz-appearance: textfield;
}

.quantity 
{
    margin-top: 30px;
    font-size: 20px;
    color: #2F4550;
    font-weight: bolder;
    text-align: center;
    border: none;
    outline: none;
    background-color: #8490dd;
    height: 40px;
    width: 70px;
    transition: 0.3s ease;
    -moz-appearance: textfield;
}
.quantity:hover
{
    background-color: #face4a;
    transition: 0.3s ease;
}
.quantity:focus
{
    background-color: #FFC107;
}


/*Quan and qtext are the div containing quantity box
and the "quantity" text */
.quan
{
    display: flex;
    justify-content: space-between;
    width: 1px;
}
.qtext
{
    margin-top: 35px;
    font-size: 30px;
}



h5
{
    margin-top: 10px;
    margin-right: 10px;
}
.price 
{
    display: flex;
    justify-content: space-around;
    font-size: 27px;
    text-align: center;
    margin-top: -10px; /* Adjust the margin as needed */
}
   
</style>





    <footer class="copy" id="footer">
    <p>&copy;  DBMS Project Fall 2023.
    <br>
    This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
    <br>
    All rights reserved.  </p>
    </footer>
</body>
</html>