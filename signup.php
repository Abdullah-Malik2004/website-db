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
    Input[2] = document.getElementById("dob").value;

    if(Input[0] != "" && Input[1] != "" && Input[2] != "")
        allFieldsFilled = true;


    if (allFieldsFilled) 
    {
        changesection(section1,section2);
    } 
    else 
        AlertF();
    
}


function checkEmail()
{
    event.preventDefault();
    var section2 = document.querySelector('.section2');
    var section3 = document.querySelector('.section3');
    var allFieldsFilled2 = false;

    Input[3] = document.getElementById("username").value;
    Input[4] = document.getElementById("Phone").value;

    if(Input[3] != "" && Input[4] != "")
        allFieldsFilled2 = true;

    if (allFieldsFilled2) 
        changesection(section2, section3);
    else 
        AlertF();
}

function checkAdd()
{
    event.preventDefault();
    var Address = document.getElementById("address").value;

    var section4 = document.querySelector('.section4');
    var section3 = document.querySelector('.section3');
    
    if(Address != "")
        changesection(section3, section4);
    else{
        alert("Enter your address");
    }
        
}

function CheckPassword()
{
    event.preventDefault();

    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("passwordC").value;

    

    if (password !== "" && confirmPassword === password) 
    {
        
        if(password.length>=8)
            document.getElementById('signupForm').submit();
        else
            alert("The passwords must have 8 or more characters");
    } 
    else 
        alert("The passwords do not match");
}

function changesection(sectionFrom,sectionTo)
{
    sectionFrom.style.display='none';
    sectionTo.style.display='block';
    
}
function BackSec1(){
    event.preventDefault();
    var section1 = document.querySelector('.section1');
    var section2 = document.querySelector('.section2');
    changesection(section2,section1);
}
function BackSec2(){
    event.preventDefault();
    var section2 = document.querySelector('.section2');
    var section3 = document.querySelector('.section3');
    changesection(section3,section2);
}

function BackSec3(){
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

            <div class="section3" style="display:none; margin-bottom: 30px;">

                <h3>Personal Information</h3>

                <div class="address" id="address">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="4" cols="30"></textarea>
                </div>


                <input type="submit" value="Next" onclick='checkAdd()' >
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
        $dob = $_POST['dob'];

        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS); // This is the entered password
        // Hash the password using a secure hashing algorithm (e.g., bcrypt)
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $email = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST,"Phone",FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST,"address",FILTER_SANITIZE_SPECIAL_CHARS);
        $verify_token=md5(rand());
        
        
        
        $sql="INSERT INTO customer (fname,lname,email,password,address,phoneno,DateOfBirth,verify_token) 
        VALUES ('$fname','$lname','$email','$hashedPassword','$address','$phone','$dob','$verify_token')";

        $result= mysqli_query($conn, $sql);
        
        if($result){
            
            mysqli_query($conn, $sql);
            //sendemail_verify("$fname","$lname","$email","$verify_token");
            echo "<script>
             alert('Registration succesfull!')
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

