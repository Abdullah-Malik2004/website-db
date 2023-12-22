<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-BOOKS</title>
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
        <h1>BOOKS</h1>
        <hr>

        <div class="f2 " >
            <div class="general" id="general">
                <img src="books/quran.png" class="im" >
                <div class="textcontainer" id="quran">
                    <h3 onclick="addToCart('quran', 'books/quran.png', document.getElementById('quranQuantity').value)">Quran Karim</h3>
                    <div class="cc">
                        <h5 onclick="addToCart('quran', 'books/quran.png', document.getElementById('quranQuantity').value)">Add to Cart</h5>
                        <i class="fa-solid fa-cart-shopping" onclick="addToCart('quran', 'books/quran.png', document.getElementById('quranQuantity').value)"></i>
                    </div>
            </div>
            <div class="price">
                <div class="quan">
                    <h5 class="qtext">Quantity: </h5>
                    <input type="number" class="quantity" id="quranQuantity" value="1" min="1">
                </div>
                    <h4><br>$2.99</h4>
                </div>
            </div>
            

            <div class="general">
                <img src="books/winter.png" class="im">
                <div class="textcontainer" id="winter" >
                    <h3 onclick="addToCart('winter', 'books/winter.png', document.getElementById('quranQuantity').value)">Winter Winter</h3>
                    <div class="cc">
                            <h5 onclick="addToCart('winter', 'books/winter.png', document.getElementById('quranQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('winter', 'books/winter.png', document.getElementById('quranQuantity').value)"></i>
                    </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="winterQuantity" value="1" min="1">
                    </div>
                    <h4><br>$3.49</h4>
                </div>
            </div>
        </div>

        <br>
        <hr>

        <div class="s2 ">
            <div class="general">
                <img src="books/bussi.png" class="im"  >
                <div class="textcontainer" id="bussi">
                    <h3 onclick="addToCart('bussi', 'books/bussi.png', document.getElementById('quranQuantity').value)">How to Bussiness</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('bussi', 'books/bussi.png', document.getElementById('quranQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('bussi', 'books/wwz.jpg', 'books/bussi.png', document.getElementById('quranQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="bussiQuantity" value="1" min="1">
                    </div>
                    <h4><br>$8.99</h4>
                </div>
                
            </div>

            <div class="general">
                <img src="books/head.png" class="im">
                <div class="textcontainer" id="head">
                    <h3 onclick="addToCart('head', 'books/head.png', document.getElementById('quranQuantity').value)">Head Lines</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('head', 'books/head.png', document.getElementById('quranQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('head', 'books/head.png', document.getElementById('quranQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="headQuantity" value="1" min="1">
                    </div>
                    <h4><br>$4.98</h4>
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
    <script src="categoryCss/nBook.js"></script>
</body>
</html>

