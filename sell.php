<?php
    include('database.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $pname = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
        $desc = filter_input(INPUT_POST,"desc",FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST,"price",FILTER_SANITIZE_SPECIAL_CHARS); 
        $stock = filter_input(INPUT_POST,"stock",FILTER_SANITIZE_SPECIAL_CHARS);
        $category = filter_input(INPUT_POST,"category",FILTER_SANITIZE_SPECIAL_CHARS);
        $image_data = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $folder = $image_data;
        
        
        $stmt = $conn->prepare("SELECT categoryId from category WHERE categoryName = ?");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $stmt->bind_result($categoryid);
    
        if ($stmt->fetch()) {
            $sellid=$_SESSION['fid'];
            $stmt->close();
            
            $sql="INSERT INTO product (Name,description,price,StockQuantity,sellerId,categoryid,image_data) 
            VALUES ('$pname','$desc',$price,$stock,$sellid,$categoryid,'$image_data')";
            
            if(mysqli_query($conn,$sql)){
                echo"Product has been added";}
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } 
        else{
            echo"Category not found";
        }  
        
        
    }
    


    mysqli_close($conn);
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

    <a href="seller.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    <div class="product">
        <h1>Add A Product</h1>
    </div>

    <div class="addproduct">
        <form id="productForm" action="sell.php" method="post" enctype="multipart/form-data">

            <div class="name">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="name">
                <label for="desc">Description</label>
                <input type="text" id="desc" name="desc" required>
            </div>

            <div class="name">
                <label for="price">Price ($)</label>
                <input type="text" id="price" name="price" required>
            </div>

            <div class="name">
                <label for="stock">Quantity</label>
                <input type="text" id="stock" name="stock" required>
            </div>

            <div class="name">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" required>
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