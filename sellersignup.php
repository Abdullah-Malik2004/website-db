<?php
    include('database.php');
    session_start();
    session_unset();
    session_destroy();
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business - SignUp</title>
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" href="headerCOSMOS.png">

</head>
<body>
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    <div class="sign">
        <form id='signupForm' action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Sign Up</h1>

            <div class="section1">

                <h3>Personal Information</h3>

                <div class="fname">
                    <label for="Fname">First Name</label>
                    <input type="text" id="fname" name="fname">
                </div>
    
                <div class="lname">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname">
                </div>

                <div class="CNIC">
                    <label for="CNIC">CNIC</label>
                    <input type="text" id="CNIC" name="CNIC">
                </div>                

                

                <input type="submit" value="Next" onclick='checkName()'>
            </div>


            <div class="section2" style="display:none;">

                <h3>Personal Information</h3>

                <div class="email" id="email">
                    <label for="email">Email</label>
                    <input type="email" id="username" name="username" >
                </div>

                <div class="Phone" id="Phone">
                    <label for="Phone">Phone Number</label>
                    <input type="text" id="Phone" name="Phone" >
                </div>

                


                <input type="submit" value="Next" onclick='checkEmail()' >
                <input type="submit" value="Back" onclick='BackSec1()'>
                
            
            </div>
            
            <div class="section3" style="display:none;">

                <h3>Bussiness Information</h3>

                <div class="BussinessName" id="BussinessName">
                    <label for="BussinessName">Bussiness Name</label>
                    <input type="text" id="bussinessName" name="BussinessName" >
                </div>

                <div class="BussinessType" id="BussinessType">
                    <label for="BussinessType">Bussiness Type</label>
                    <input type="text" id="bussinessType" name="BussinessType" >
                </div>




                <input type="submit" value="Next" onclick='checkBname()' >
                <input type="submit" value="Back" onclick='BackSec2()'>
                
            
            </div>

            <div class="section4" style="display:none;">
                <h3>Account Information</h3>

                <div class="Password" >
                    <label for="Password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="PasswordC" >
                    <label for="Password">Confirm Password</label>
                    <input type="password" id="passwordC" name="passwordC"` >
                </div>
            
                <input type="submit" value="Next" onclick = 'CheckPassword()'> 
                <input type="submit" value="Back" onclick='BackSec3()'>
  
            </div>

            

            
                
            
            
            
            
            
            
            
            <!--
                <input type="submit" value="Sign Up">
            -->

        </form>
    </div>

    <div class="cant">
        <a href="sellersignin.php">Already have a Business Account! Sign in HERE.        </a>
    </div>

    <script>
        var Input = []; 
        var items; 

        function checkName() 
        {
            event.preventDefault();
            var allFieldsFilled = false;
            var section1 = document.querySelector('.section1');
            var section2 = document.querySelector('.section2');

            Input[0] = document.getElementById("fname").value;
            Input[1] = document.getElementById("lname").value;
            

            if(Input[0] != "" && Input[1] != "" )
                allFieldsFilled = true;


            if (allFieldsFilled) 
                changesection(section1,section2);
            else 
                AlertF();
            
        }


        function checkEmail()
        {
            event.preventDefault();
            var section2 = document.querySelector('.section2');
            var section3 = document.querySelector('.section3');
            var allFieldsFilled2 = false;

            Input[2] = document.getElementById("username").value;
            Input[3] = document.getElementById("Phone").value;


            if(Input[2] != "" && Input[3] != "")
                allFieldsFilled2 = true;

            if (allFieldsFilled2) 
                changesection(section2, section3);
            
        }

        function checkBname() {
    event.preventDefault();
    var section3 = document.querySelector('.section3');
    var section4 = document.querySelector('.section4');
    var allFieldsFilled2 = false;

    Input[4] = document.getElementById("bussinessName").value;
    Input[5] = document.getElementById("bussinessType").value;

    console.log("bussinessName:", Input[4]);
    console.log("bussinessType:", Input[5]);

    if (Input[4] != "" && Input[5] != "") {
        allFieldsFilled2 = true;
    }

    if (allFieldsFilled2) {
        changesection(section3, section4);
    } 
}

        function CheckPassword()
        {
            event.preventDefault();

            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("passwordC").value;

            if (password !== "" && confirmPassword === password) 
            {
                console.log(password.length);
                if(password.length>=8)
                    document.getElementById('signupForm').submit();
                else
                    alert("The passwords must have 8 or more characters");
                
            } 
            else 
            {
                console.log("Passwords do not match. Alerting user.");
                alert("The passwords do not match");
            }
        }

        function changesection(sectionFrom,sectionTo)
        {
            sectionFrom.style.display='none';
            sectionTo.style.display='block';
        }
        function BackSec1()
        {
            event.preventDefault();
            var section1 = document.querySelector('.section1');
            var section2 = document.querySelector('.section2');
            changesection(section2,section1);
        }
        function BackSec2()
        {
            event.preventDefault();
            var section2 = document.querySelector('.section2');
            var section3 = document.querySelector('.section3');
            changesection(section3,section2);
        }
        function BackSec3()
        {
            event.preventDefault();
            var section3 = document.querySelector('.section3');
            var section4 = document.querySelector('.section4');
            changesection(section4,section3);
        }

        function BackSec4()
        {
            alert(43);
            event.preventDefault();
            var section3 = document.querySelector('.section3');
            var section4 = document.querySelector('.section4');
            changesection(section4,section3);
        }
        function AlertF()
        {
            alert("Please fill in all the boxes");
        }
    </script>

</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = filter_input(INPUT_POST,"fname",FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST,"lname",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $email = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST,"Phone",FILTER_SANITIZE_SPECIAL_CHARS);
        $businessname = filter_input(INPUT_POST,"BussinessName",FILTER_SANITIZE_SPECIAL_CHARS);
        $businesstype = filter_input(INPUT_POST,"BussinessType",FILTER_SANITIZE_SPECIAL_CHARS);
        $cnic = filter_input(INPUT_POST,"CNIC",FILTER_SANITIZE_SPECIAL_CHARS);
        
    
        $sql="INSERT INTO seller (fname,lname,email,password,address,phoneno,business_name,business_type,cnic) 
        VALUES ('$fname','$lname','$email','$hashedPassword','A-354','$phone','$businessname','$businesstype','$cnic')";
        
        if(mysqli_query($conn, $sql)){
            echo"<script>
             alert('Seller account request has been sent! Waiting for approval')
             </script>";
             
        }
        else{
            echo "<script>
            alert('Your e-mail or phone number is already taken. Sign up again')
            </script>";
        }
        
        
        
    }
    


    mysqli_close($conn);
?>