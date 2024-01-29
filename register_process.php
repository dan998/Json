<?php
if(isset($_POST['register'])) {
    // Load users from the JSON file
    $users = json_decode(file_get_contents('users.json'), true);

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            // Username already exists, redirect back to registration page
            header("Location: register.php?error=username_exists");
            exit();
        }
    }

    // Add the new user to the array
    $new_user = array('username' => $username, 'password' => $password);
    $users[] = $new_user;

    // Save the updated user array back to the JSON file
    file_put_contents('users.json', json_encode($users));

    // Redirect to login page after registration
    header("Location: login.php");
    exit();
}
?>
