<?php
    include('database.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-Sign Up</title>
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
        <form id='signupForm' action="signup.php" method="post">
            <h1>Sign Up</h1>

            <!--
                <div class="option">
                <label for="choose">What Account would you like?</label>


                <label class="custom">Provider
                    <input type="radio" name="radio" onclick="updateSelectedValue(this)">
                  </label>
                  
                  <label class="custom">Customer
                    <input type="radio" name="radio">
                  </label>


                <button type="button" onclick="see()">Next</button>
            </div>
            -->
            

            
            <div class="section1">

                <h3>Personal Information</h3>

                <div class="fname">
                    <label for="Fname">First Name</label>
                    <input type="text" id="fname" name="fname" required>
                </div>
    
                <div class="lname">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" required>
                </div>

                <div class="date-of-birth-container">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                

                <input type="submit" value="Next" onclick='checkName()'>
            </div>


            <div class="section2" style="display:none;">

                <h3>Personal Information</h3>

                <div class="email" id="email">
                    <label for="email">Email</label>
                    <input type="email" id="username" name="username" required>
                </div>

                <div class="Phone" id="Phone">
                    <label for="Phone">Phone Number</label>
                    <input type="text" id="Phone" name="Phone" required>
                </div>


                <input type="submit" value="Next" onclick='checkEmail()' >
                <input type="submit" value="Back" onclick='BackSec1()'>
                


                

            
            </div>

            <div class="section3" style="display:none;">
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
                <input type="submit" value="Back" onclick='BackSec2()'>
  
            </div>
            
                
            
            
            
            
            
            
            
            <!--
                <input type="submit" value="Sign Up">
            -->

        </form>
    </div>

    <div class="cant">
        <a href="signin.php">Already have an Account! Sign in HERE.        </a>
    </div>

    <script src="signup.js"></script>
</body>
</html>
<?php



    /*use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    function sendemail_verify($fname,$lname,$email,$verify_token)
    {
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 2;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                                                      
        $mail->Username   = 'abdullahwaqar29august@gmail.com';                    
        $mail->Password   = '@bdullah123';                              
        $mail->SMTPSecure = "ssl";   
        $mail->Port       = 465;                                   

        //Recipients
        $mail->setFrom('abdullahwaqar29august@gmail.com');
        $mail->addAddress($email,$fname);     //Add a recipient
        

        $email_template = "
            <h2>You have registered with COSMOS </h2>
            <h5>Verify your email address to login using the link given below</h5>
            <br/><br/>
            <a href='http://localhost/websit/verify_email.php?token=$verify_token'>Click me</a> 
        ";
        

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from COSMOS';
        $mail->Body    = $email_template;
        

        $mail->send();
        
    }*/

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = filter_input(INPUT_POST,"fname",FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST,"lname",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS); // This is the entered password
        // Hash the password using a secure hashing algorithm (e.g., bcrypt)
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $email = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST,"Phone",FILTER_SANITIZE_SPECIAL_CHARS);
        $verify_token=md5(rand());
        
        
        
        $sql="INSERT INTO customer (fname,lname,email,password,address,phoneno,age,verify_token) 
        VALUES ('$fname','$lname','$email','$hashedPassword','A-354','$phone',19,'$verify_token')";

        $result= mysqli_query($conn, $sql);
        
        if($result){
            
            mysqli_query($conn, $sql);
            //sendemail_verify("$fname","$lname","$email","$verify_token");
            echo "<script>
             alert('Registration succesfull! Please verify your e-mail address')
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