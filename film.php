<?php 
    include('database.php');
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location:signIn.php");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productid = $_POST['product_id'];
        $customerid = $_SESSION['cid'];
        $quantity = $_POST['quantity'];
        

        $sql = "INSERT into cart values($customerid,$productid,$quantity)";
        $result = mysqli_query($conn,$sql);

        if($result){
            
            mysqli_query($conn, $sql);
            
            echo "<script>
             alert('Added to cart succesfully!')
              </script>";
           
        }
        else{
            
            echo "<script>
            alert('Already added to cart')
            </script>";
            
        }
        

        
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-FILMS</title>
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
    <h1>FILMS</h1>
    <hr>

    <?php

        $productsPerPage = 4;

        $totalProducts = 0;
        $sql = "SELECT * from Product where categoryid = 5";

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {

            $totalProducts++;

        }

        // Get the current page from the URL or set a default
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Calculate the offset for the SQL query
        $offset = ($current_page - 1) * $productsPerPage;

        // Query to retrieve products with pagination
        $sql = "SELECT p.ProductID,p.Name,p.StockQuantity,p.price,p.image_data,AVG(o.rating) from Product p
        left join orders o on o.productid = p.productid
        where p.categoryid = 5
        group by p.ProductID,p.Name,p.StockQuantity,p.price,p.image_data LIMIT $offset, $productsPerPage";
        $result = $conn->query($sql);

    if($result->num_rows>0){

        $index=0;

        while($row = $result->fetch_assoc())
        {
            echo '<form id="AddToCartForm' . $row['ProductID'] . '" method="post" action="games.php">';
            echo '<div class="assissin" id="assissin">';
            echo '<img src="' . $row["image_data"] . '" class="im" style="width: 680px;  height: 372px;">';
            echo '<div class="textcontainer" id="' . $row['ProductID'] . '">';
            echo '<h3 onclick="addToCart(\'' . $row['ProductID'] . '\', \'' . $row["image_data"] . '\', document.getElementById(\'' . $row['ProductID'] . 'Quantity\').value)">' . $row["Name"] . '</h3>';
            echo '<div class="cc">';
            echo '<input type="hidden" name="product_id" value="' . $row['ProductID'] . '">';
            echo '<input type="submit" name="action" value="Add To Cart">';
            echo '<h5 onclick="addToCart(\'' . $row['ProductID'] . '\', \'' . $row["image_data"] . '\', document.getElementById(\'' . $row['ProductID'] . 'Quantity\').value)">Add to Cart</h5>';
            echo '<i class="fa-solid fa-cart-shopping" onclick="addToCart(\'' . $row['ProductID'] . '\', \'' . $row["image_data"] . '\', document.getElementById(\'' . $row['ProductID'] . 'Quantity\').value)"></i>';
            echo '</div>';
            echo '</div>';
            echo '<div class="price">';
            echo '<div class="quan">';
            echo '<h5 class="qtext">Quantity: </h5>';
            echo '<input type="number" class="quantity" name="quantity" id="' . $row['ProductID'] . 'Quantity" value="1" min="1">';
            echo '</div>';
            echo '<h4><br> $' . $row["price"] . '</h4>';
            
            echo '</div>';
            echo '<div class="stock">';
            echo '<h4><br> '.$row['StockQuantity'].' left             ';
            echo 'Rating:'.number_format($row['AVG(o.rating)'],2).'';
            echo '</div>';
            echo '</div>';

            echo '<hr>';
            echo '</form>';
            $index++;
        }
        $totalPages = ceil($totalProducts / $productsPerPage);
       
    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '" >' . $i . '</a>';
    }
    echo '</div>';

    }

    else{
        echo'No products for this category';
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