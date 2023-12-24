<?php 
    include('database.php');
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location:signIn.php");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productid = $_POST['action'];
        $customerid = $_SESSION['cid'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT into cart values($customerid,$productid,$quantity)";
        $result = mysqli_query($conn,$sql);

        if($result){
            
            mysqli_query($conn, $sql);
            
            echo "<script>
             alert('Added to cart succesfully!')
             window.location.href = 'games.php'
              </script>";
           
        }
        else{
            
            echo "<script>
            alert('Already added to cart')
            window.location.href = 'games.php'
            </script>";

            
            
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
    <h1>GAMES</h1>
    <hr>

    <?php

        $productsPerPage = 4;

        $totalProducts = 0;
        $sql = "SELECT * from Product";

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {

            $totalProducts++;

        }

        // Get the current page from the URL or set a default
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Calculate the offset for the SQL query
        $offset = ($current_page - 1) * $productsPerPage;

        // Query to retrieve products with pagination
        $sql = "SELECT * FROM product where categoryid=1 LIMIT $offset, $productsPerPage";
        $result = $conn->query($sql);

    if($result->num_rows>0){

        $index=0;

        while($row = $result->fetch_assoc()){

            echo '<form id="AddToCartForm' . $row['ProductID'] . '" method="post" action="games.php">';
            echo '<div class="f2" >';
            echo '<div class="assissin" id="assissin">';
            echo '<img src="' . $row["image_data"] . '" class="im" style="width: 680px; height: 372px;" >';
            echo '<div class="textcontainer">';
            //echo '<input type="submit" name="request_id" value="' . $row['ProductID'] . '">';
            echo '<h3 onclick="addToCart(' . $row['ProductID'] . ')">' . $row["Name"] . '</h3>';
            echo '<div class="cc">';
            echo '<input type="submit" name="action" value="' . $row['ProductID'] . '">Add To Cart';
            echo '<input type="hidden" name="hidden_field[' . $index . ']" value="' . $row['ProductID'] . '">';
            echo '<i class="fa-solid fa-cart-shopping" onclick="addToCart(' . $row['ProductID'] . ')"></i>';
            echo '</div>';
            echo '</div>';
            echo '<div class="quan">';
            echo '<h5 class="qtext">Quantity: </h5>';
            echo '<input type="number" class="quantity" name="quantity" id="' . $row['ProductID'] . 'Quantity" value="1" min="1">';
            echo '</div>';
            echo '<div class="price">';
            echo '<h4><br>' . $row["price"] . '</h4>';
            echo '</div>';
            echo '</div>'; // Close the div with class "assissin"
            echo '</div>'; // Close the div with class "f2"
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
    <footer class="copy" id="footer">
        <p>&copy;  DBMS Project Fall 2023.
        <br>
        This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
        <br>
        All rights reserved.  </p>
    </footer>
</body>
</html>