<?php
$login=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'database.php';
    $email= $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("SELECT sellerID,fname,lname,password FROM seller WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($fid,$fname,$lname,$hashed_password);

    if ($stmt->fetch()) {
        // User found, verify the password
        if (password_verify($password, $hashed_password)) {
            // Passwords match, user authenticated
            $login=true;
            session_start();
            $_SESSION['sloggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['fid'] = $fid;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            header("location: seller.php");
        } else {
            // Passwords do not match, authentication failed
            $showerror="Passwords do not match, authentication failed";
        }
    } else {
        // User not found, authentication failed
        $showerror="User not found, authentication failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business- Sign In</title>

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

    <?php
    if($login){
        echo'<div class="alert alert-success alert dismissable fade show" role = "alert">
        <strong>Success!</strong>  You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span
        </button>
        </div>';
    }  
    if($showerror){
        echo'<div class="alert alert-danger alert dismissable fade show" role = "alert">
        <strong>Error!</strong> '.$showerror.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span
        </button>
        </div>';
    }  
    ?>

    <div class="sign">
        <form id="signinForm" action="sellersignin.php" method="post">
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
        <a href="sellersignup.php">Don't have an account? Sign up!</a>
        <br><br>
        <a href="signin.php">Sign In to your customer account!</a>

    </div>  
    


</body>
</html>