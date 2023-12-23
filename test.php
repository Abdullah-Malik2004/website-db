<?php



    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    function sendemail_verify($fname,$lname,$email)
    {
        $mail = new PHPMailer(true);  
        $mail->SMTPDebug = 1;              
        $mail->isSMTP();                                    
        $mail->Host       = 'smtp.example.com';   
        $mail->SMTPAuth = true;                                                        
        $mail->Username   = 'abdullahwaqar29august@gmail.com';                    
        $mail->Password   = '@bdullah123';                              
        $mail->SMTPSecure = "ssl";   
        $mail->Port       = 587;                                   

        //Recipients
        $mail->setFrom('abdullahwaqar29august@gmail.com',$fname);
        $mail->addAddress($email);     //Add a recipient
        

        $email_template = "
            <h2>You have registered with COSMOS </h2>
            <h5>Verify your email address to login using the link given below</h5>
            <br/><br/>
            <a href='http://localhost/websit/verify_email.php'>Click me</a> 
        ";
        

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from COSMOS';
        $mail->Body    = $email_template;
        

        $mail->send();
        
    }
    $email='abdullahwaqar29august@gmail.com';
    $fname='Abdullah';
    $lname='Waqar';
    sendemail_verify("$fname","$lname","$email");

    <?php
    include('database.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pname = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
        $desc = filter_input(INPUT_POST,"desc",FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST,"price",FILTER_SANITIZE_SPECIAL_CHARS); 
        $stock = filter_input(INPUT_POST,"stock",FILTER_SANITIZE_SPECIAL_CHARS);
        $category = filter_input(INPUT_POST,"category",FILTER_SANITIZE_SPECIAL_CHARS);
        $image_data = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $folder = $image_data;
        move_uploaded_file($temp_name,$folder);
        
        
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
?>    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="addproduct">
        <form id="productForm" action="sell.php" method="post" enctype="multipart/form-data">
            <h1>Add A Product</h1>

            <div class="name">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="description">
                <label for="desc">Description</label>
                <input type="text" id="desc" name="desc" required>
            </div>

            <div class="price">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" required>
            </div>

            <div class="stock">
                <label for="stock">Price</label>
                <input type="text" id="stock" name="stock" required>
            </div>

            <div class="category">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" required>
            </div>

            <div class="image">
                <label for="image">Add Image (680x372)</label>
            <input type="file" name="image" required>
            </div>
            
            <input type="submit" value="Continue" >
        </form>

        
    </div>
</body>
</html>