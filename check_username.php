<?php
// Load users from the JSON file
$users = json_decode(file_get_contents('users.json'), true);

if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $exists = false;
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            $exists = true;
            break;
        }
    }
    echo json_encode(array('exists' => $exists));
}
?>
