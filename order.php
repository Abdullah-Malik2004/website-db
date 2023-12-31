<?php
    include('database.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $address = $_POST['address'];
        $pmethod = $_POST['paymentMethod'];
        $selectedCoupons = $_POST["couponCheckbox"];
        $cid = $_SESSION['cid'];
        $sql = "Select * from temp_table";
        $result = mysqli_query($conn,$sql);
        $count = 0;
        $doff = 0;
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){

                $stmt = $conn->prepare("SELECT price from product where productid = ?");
                $stmt->bind_param("s",$row['pid']);
                $stmt->execute();
                $stmt->bind_result($price);
                $stmt->fetch();
                $stmt->close();
                $tprice=$price*$row['quantity'];
                echo $cid;
                echo $row['pid'];
                echo $price;
                $tprice = number_format($tprice, 2);
                echo $tprice;
                echo ''.$row['quantity'].'<br>';
                $cpoints = floor($tprice/10);

                $sql = "INSERT into orders (customerid, productid, total_amount, status, quantity) 
                        Values (?, ?, ?, 'pending', ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iidi", $cid, $row['pid'], $tprice, $row['quantity']);
                $result2 = $stmt->execute();
                $stmt->close();

                if ($result2) {
                    $sql = "UPDATE Product
                            SET StockQuantity = StockQuantity - ?
                            WHERE ProductId = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $row['quantity'], $row['pid']);
                    $stmt->execute();
                    $stmt->close();

                    $sql = "UPDATE Customer
                            SET CosmoPoints = CosmoPoints + ?
                            WHERE CustomerID = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $cpoints, $cid);
                    $stmt->execute();
                    $stmt->close();



                    $sql = "UPDATE Customer
                            SET address = ?
                            WHERE CustomerID = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("si",$address, $cid);
                    $stmt->execute();
                    $stmt->close();

                    
                    $sql = "SELECT orderid from orders
                            order by orderid limit 1";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($orderid);
                    $stmt->fetch();
                    $stmt->close();
                    
                    
                    if($count==0){
                        foreach ($selectedCoupons as $selectedCoupon) {
                            $sql = "SELECT couponid FROM coupon where dollarsoff = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("d", $selectedCoupon);
                            $stmt->execute();
                            $doff = $selectedCoupon;
                            $stmt->bind_result($couponid);
                            $stmt->fetch();
                            $stmt->close();
                        }
                    }

                    if($doff!=0){
                        if($doff>=$tprice){
                            $doff-=$tprice;
                            $tprice = 0;
                        }
                        if($doff<$tprice){
                            $tprice-=$doff;
                            $doff = 0;
                        }
                    }

                    $sql = "INSERT INTO payment(orderid,method,amount)
                            VALUES ($orderid,'$pmethod',$tprice)";
                    mysqli_query($conn,$sql);

                    

                    $sql = "DELETE FROM customercoupon where customerid = ? AND couponid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $cid, $couponid);
                    $stmt->execute();
                    $stmt->close();

                    $sql = "DELETE FROM cart 
                            WHERE customerid = ? AND productid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $cid, $row['pid']);
                    $stmt->execute();
                    $stmt->close();


                    $count++;
                    

                    
                }
            }
            $sql = "DELETE FROM temp_table";
            mysqli_query($conn,$sql);
            echo"<script>
            alert('Your order has been placed succesfully. Continue shopping')
            window.location.href = 'main.php'
            </script>";
        }
    }
    else {
        echo"Naqh Nah nigga";
    }
?>
