<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-CART</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    
    <hr>
    <h1>CART</h1>
    <hr>
    <div class="total"></div>
    <script>
        var totalAmount; 

    
        window.onload = function () {
            reload();
            // Access the total amount after the reload function
            //totalAmount = calculateAndDisplayTotalAmount();
            //console.log('Total Amount:', totalAmount);
        };

        


    </script>
    <div class="itemPicture"></div>

    <footer class="copy" id="footer" >
        <p>&copy;  DBMS Project Fall 2023.
        <br>
        This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
        <br>
        All rights reserved.  </p>
    </footer>
    <style>
        footer
        {
            bottom: 0;
            font-size: 15px;
        }
        
        h1
        {
            margin: 100px auto; /* Updated margin to center horizontally */
            text-align: center;
        }
        i:hover 
        {
            color: yellow; /* Change to your desired color */
            cursor: pointer;
        }
    </style>

    <script src="ncart.js">
        
        
    </script>
    
</body>
</html>


