<?php
$login=false;
$showerror=false;
session_start();
session_unset();
session_destroy();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'database.php';
    $email= $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("SELECT CustomerID,fname,lname,password FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($cid,$fname,$lname,$hashed_password);

    if ($stmt->fetch()) {
        // User found, verify the password
        if (password_verify($password, $hashed_password)) {
            // Passwords match, user authenticated
            $login=true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['cid'] = $cid;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            header("location: main.php");
            exit;
        } else {
            // Passwords do not match, authentication failed
            $showerror="Passwords do not match, authentication failed";
        }
    } else {
        //$stmt->close();
        $stmt = $conn->prepare("SELECT AdminID,fname,lname,password FROM administrator WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($aid,$fname,$lname,$hashed_password);

        if ($stmt->fetch()) {
            // User found, verify the password
            if (password_verify($password, $hashed_password)) {
                // Passwords match, user authenticated
                $login=true;
                session_start();
                $_SESSION['aloggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['aid'] = $aid;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                header("location: admin.php");
                exit;
            } else {
                // Passwords do not match, authentication failed
                echo'<script>
                alert("Passwords do not match, authentication failed")
                </script>';
            }
        }
        else{
           echo "<script>
           alert('User not found, authentication failed')
           </script>";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-Sign In</title>

    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="border.css">
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
        <form id="signinForm" action="signIn.php" method="post">
            <h1>Sign In</h1>

            <div class="email">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            
            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <input type="submit" value="Continue" >
        </form>
    </div>

    <div class="cant">
        <a href="signup.php">Don't have an account? Sign up!</a>
        <br><br>
        <a href="sellersignin.php">Sign In to your business account!</a>
    </div>


    
</body>
</html>