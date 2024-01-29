<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration Form</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f0f0f0;
           margin: 0;
           padding: 0;
       }

       .container {
           max-width: 400px;
           margin: 50px auto;
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

       label {
           display: block;
           margin-bottom: 10px;
           color: #555;
       }

       input[type="text"],
       input[type="password"],
       input[type="submit"] {
           width: 100%;
           padding: 10px;
           margin-bottom: 20px;
           border: 1px solid #ccc;
           border-radius: 5px;
           box-sizing: border-box;
       }

       input[type="submit"] {
           background-color: #007bff;
           color: #fff;
           cursor: pointer;
       }

       input[type="submit"]:hover {
           background-color: #0056b3;
       }

       .login-link {
           text-align: center;
       }

       .login-link a {
           color: #007bff;
           text-decoration: none;
       }

       .login-link a:hover {
           text-decoration: underline;
       }
   </style>
   <script>
       function checkUsername() {
           var username = document.getElementById('username').value;
           // Perform AJAX request to check if the username exists
           var xhr = new XMLHttpRequest();
           xhr.onreadystatechange = function() {
               if (xhr.readyState === XMLHttpRequest.DONE) {
                   if (xhr.status === 200) {
                       var response = JSON.parse(xhr.responseText);
                       if (response.exists) {
                           alert('Username already exists. Please choose a different one.');
                           document.getElementById('username').value = '';
                       }
                   } else {
                       console.error('Error occurred while checking username.');
                   }
               }
           };
           xhr.open('POST', 'check_username.php', true);
           xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           xhr.send('username=' + username);
       }
   </script>
</head>
<body>
   <div class="container">
       <h2>Registration Form</h2>
       <form action="register_process.php" method="post">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required onchange="checkUsername()">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>

          <input type="submit" name="register" value="Register">

          <div class="login-link">
              Already have an account? <a href="login.php">Login</a>
          </div>
       </form>
   </div>
</body>
</html>
