<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-ELECTRONICS</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="categoryCss/book.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="body">
    <a href="main.php">
            <div class = 'logobar'>
                <div class="logo-cover border_logo">
                    <div class="logo"></div>
                </div>
            </div>
        </a>
        

        <hr>
        <h1>ELECTRONICS</h1>
        <hr>

        <div class="f2 " >
            <div class="general" id="general">
                <img src="electronics/laptop.png" class="im" >
                <div class="textcontainer" id="laptop">
                    <h3 onclick="addToCart('laptop', 'electronics/laptop.png', document.getElementById('laptopQuantity').value)">Laptop</h3>
                    <div class="cc">
                        <h5 onclick="addToCart('laptop', 'electronics/laptop.png', document.getElementById('laptopQuantity').value)">Add to Cart</h5>
                        <i class="fa-solid fa-cart-shopping" onclick="addToCart('laptop', 'electronics/laptop.png', document.getElementById('hoodieQuantity').value)"></i>
                    </div>
            </div>
            <div class="price">
                <div class="quan">
                    <h5 class="qtext">Quantity: </h5>
                    <input type="number" class="quantity" id="laptopQuantity" value="1" min="1">
                </div>
                    <h4><br>$999</h4>
                </div>
            </div>

            <div class="general">
                <img src= "electronics/headphone.png" class="im">
                <div class="textcontainer" id="phone" >
                    <h3 onclick="addToCart('phone', 'electronics/phone.png', document.getElementById('phoneQuantity').value)">Head Phones</h3>
                    <div class="cc">
                            <h5 onclick="addToCart('phone', 'electronics/phone.png', document.getElementById('phoneQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('phone', 'electronics/phone.png', document.getElementById('quranQuantity').value)"></i>
                    </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="phoneQuantity" value="1" min="1">
                    </div>
                    <h4><br>$99.9</h4>
                </div>
            </div>
        </div>

        <br>
        <hr>


        <div class="s2 ">
            <div class="general">
                <img src= "electronics/microp.png" class="im"  >
                <div class="textcontainer" id="board">
                    <h3 onclick="addToCart('board', 'electronics/microp.png', document.getElementById('boardQuantity').value)">Circuit Boards</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('board', 'electronics/microp.png', document.getElementById('boardQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('board', 'electronics/microp.png', document.getElementById('boardQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="boardQuantity" value="1" min="1">
                    </div>
                    <h4><br>$29.9</h4>
                </div>
                
            </div>

            <div class="general">
                <img src= "electronics/watch.png" class="im">
                <div class="textcontainer" id="watch">
                    <h3 onclick="addToCart('watch', 'electronics/watch.png', document.getElementById('watchQuantity').value)">Shwarma watch</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('watch', 'electronics/watch.png', document.getElementById('watchQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('watch', 'electronics/watch.png', document.getElementById('watchQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="watchQuantity" value="1" min="1">
                    </div>
                    <h4><br>$48</h4>
                </div>
            </div>
        </div>

        <footer class="copy" id="footer">
        <p>&copy;  DBMS Project Fall 2023.
        <br>
        This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
        <br>
        All rights reserved.  </p>
    </footer>

    <style>
        .cc 
        {
            display: flex;
            
        }
        .fa-cart-shopping
        {
            margin-top: 10px;
        }


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
    <script src="categoryCss/electronics.js"></script>
</body>
</html>




        
            

            

        

           