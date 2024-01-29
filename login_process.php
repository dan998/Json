<?php
session_start();

// Load users from the JSON file
$users = json_decode(file_get_contents('users.json'), true);

if(isset($_POST['login'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Find the user in the array
    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            // Authentication successful, set session variables or redirect to dashboard
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    }

    // Authentication failed, redirect back to login page with error message
    header("Location: login.php?error=invalid_credentials");
    exit();
}
?>
