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