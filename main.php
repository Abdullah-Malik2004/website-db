<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:signIn.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <header>
        <a href="main.php">
            <div class = 'logobar'>
                <div class="logo-cover border_logo">
                    <div class="logo"></div>
                </div>
            </div>
        </a>

        
        <div id="navigation">
            <ul class="list">
                <li><a class = "active" href="main.php">
                    Home
                </a></li>


                <li><a href="getcoupons.php">
                    Coupons
                </a></li>

                <li><a href="sellersignup.php">
                    Sell
                </a></li>

                <li>
                    <a href="AccDetails.php">
                        <?php echo $_SESSION['fname'],' ', $_SESSION['lname'] ?>
                    </a>
                </li>

                <li><a href="cart.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Cart
                </a></li>
            </ul>

            <!--
                <div class="border">Home</div>

            <div class="searchBar">

                <select class="All">
                    <option>All</option>
                </select>

                <input placeholder="Search Cosmos" class="bar">
                
                <div class="search_icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                
            </div>

            <div class="sign border">
                <p class="hello">Hello</p>
                <p class="in">Sign in!</p>
            </div>
            <div class="returns border">
                <p class="hello">Returns</p>
            </div>

            <div class="cart border">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="Ctext">Cart</div>
            </div>

            -->
        </div>

        
        
    </header>

    <section id="hero">
        <h6>Discover Trends, Define Your Look.</h2>
        <h2>Elevate Your Everyday.</h2>
    </section>
    

    <div class="logos">
        <div class="logoslide">
            <div class="T" onclick="openCategory('games')">
                <img src="Template1.png"  >
                <p>GAMES</p>
            </div>
            <div class="T"  onclick="openCategory('clothes')">
                <img src="Template2.png"  >
                <p>CLOTHINGS</p>
            </div>
            <div class="T">
                <img src="Template3.png" onclick="openCategory('electronics')" >
                <p>ELECTRONICS</p>
            </div>
            <div class="T">
                <img src="Template4.png" onclick="openCategory('newBook')" >
                <p>BOOKS</p>
            </div>
            <div class="T">
                <img src="Template5.png" onclick="openCategory('food')" >
                <p>FOOD</p>
            </div>
            <div class="T">
                <img src="Template6.png" onclick="openCategory('film')" >
                <p>FILMS</p>
            </div>
        </div>    

        <div class="logoslide">
            <div class="T" onclick="openCategory('games')">
                <img src="Template1.png"  >
                <p>GAMES</p>
            </div>
            <div class="T">
                <img src="Template2.png"  >
                <p>CLOTHING</p>
            </div>
            <div class="T">
                <img src="Template3.png"  >
                <p>ELECTRONICS</p>
            </div>
            <div class="T">
                <img src="Template4.png"  >
                <p>BOOKS</p>
            </div>
            <div class="T">
                <img src="Template5.png"  >
                <p>FOOD</p>
            </div>
            <div class="T">
                <img src="Template6.png"  >
                <p>FILMS</p>
            </div>
        </div>    
    </div>

    <script>
        function openCategory(category) 
        {
            // Add logic to handle the click event for the specified category
            var newPageURL = category +'.php?page=1';
            window.open(newPageURL,'_self');
            // You can replace the console.log with your desired action
            // For example, navigate to a specific page or display content related to the category
        }
    </script>

    <footer class="copy" id="footer">
        <p>&copy;  DBMS Project Fall 2023.
        <br>
        This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
        <br>
        All rights reserved.  </p>
    </footer>
    
    
</body>
</html>

