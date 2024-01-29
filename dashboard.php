<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Access the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f0f0f0;
           margin: 0;
           padding: 0;
       }

       .container {
           max-width: 1200px;
           margin: 0 auto;
           padding: 20px;
           background-color: #fff;
           border-radius: 8px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       }

       h2 {
           text-align: center;
           color: #333;
           margin-bottom: 20px;
       }

       nav {
           background-color: #007bff;
           padding: 30px 20px;
           margin-bottom: 20px;
           position: relative;
       }

       .menu-icon {
           position: absolute;
           top: 10px;
           left: 20px;
           cursor: pointer;
           z-index: 1;
       }

       .menu-icon .bar {
           width: 25px;
           height: 3px;
           background-color: #fff;
           margin: 5px 0;
       }

       .dropdown-content {
           display: none;
           position: absolute;
           background-color: #f9f9f9;
           min-width: 160px;
           box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
           z-index: 1;
       }

       .dropdown-content a {
           color: black;
           padding: 12px 16px;
           text-decoration: none;
           display: block;
       }

       .dropdown-content a:hover {
           background-color: #f1f1f1;
       }
   </style>
</head>
<body>
   <div class="container">
       <h2>Welcome, <?php echo $username; ?></h2>
       <nav>
           <div class="menu-icon" onclick="toggleDropdown()">
               <div class="bar"></div>
               <div class="bar"></div>
               <div class="bar"></div>
          <div class="dropdown-content" id="dropdownContent">
    <a href="#">Contact</a>
    <a href="#">Products</a>
    <a href="#">Promotions</a>
    <a href="#" onclick="signout()">Signout</a>
</div>
       </nav>
       <!-- Your dashboard content here -->
   </div>

   <script>
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdownContent");
        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }

    function signout() {
        // Make an AJAX request to signout.php
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Redirect to login page or handle any other logic after signout
                    window.location.href = 'login.php';
                } else {
                    console.error('Error occurred while signing out.');
                }
            }
        };
        xhr.open('GET', 'signout.php', true);
        xhr.send();
    }
</script>

</body>
</html>