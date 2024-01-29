<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
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
</head>
<body>
   <div class="container">
       <h2>Login Form</h2>
       <form action="login_process.php" method="post">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>

          <input type="submit" name="login" value="Login">
       </form>
   </div>
    <div class="login-link">
              Dont have an account? <a href="register.php">Register</a>
          </div>
</body>
</html>