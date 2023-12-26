<?php
    include('database.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cname= $_POST['name'];
        $doff= $_POST['dollarsoff'];
        $price= $_POST['price'];
        $image_data = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $folder = $image_data;
        if(move_uploaded_file($temp_name,$folder)){
            echo "";
        }
        else{
            echo "File couldn't be uploaded";
        }
        $sql="INSERT INTO coupon (Name,DollarsOff,price,image_data) VALUES (?,?,?,?)";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sdis",$cname,$doff,$price,$image_data);
        
        if($stmt->execute()){
            echo "<script>
            alert('Coupon has been added successfully')
            </script>";
        }
        else{
            echo"Coupon couldn't be added";
        }
        $stmt->close();

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Your Product</title>
    <link rel="stylesheet" href="sell.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">

</head>
<body>

    <a href="admin.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    <div class="product">
        <h1>Add A Coupon</h1>
    </div>

    <div class="addproduct">
        <form id="couponForm" action="coupon.php" method="post" enctype="multipart/form-data">

            <div class="name">
                <label for="name">Coupon Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="name">
                <label for="desc">Dollars Off</label>
                <input type="text" id="doff" name="dollarsoff" required>
            </div>

            <div class="name">
                <label for="price">Price (CosmoPoints)</label>
                <input type="text" id="price" name="price" required>
            </div>

            <div class="in">
                <input type="file" name="image" required >
                <label for="image">Add Image</label>
            </div>
            
            <input type="submit" value="Continue" class="submit" >
        </form>

        
    </div>
</body>
</html>