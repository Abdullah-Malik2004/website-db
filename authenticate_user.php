<?php
    include('database.php');
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    $stmt = $conn->prepare("SELECT password FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_password);

    if ($stmt->fetch()) {
        // User found, verify the password
        if (password_verify($user_password, $hashed_password)) {
            // Passwords match, user authenticated
            $response = array('authenticated' => true);
        } else {
            // Passwords do not match, authentication failed
            $response = array('authenticated' => false);
        }
    } else {
        // User not found, authentication failed
        $response = array('authenticated' => false);
    }

    $stmt->close();
    echo json_encode($response);
?>