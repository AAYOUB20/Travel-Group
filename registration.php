
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
      body {
            font-family: Arial, sans-serif;
            background-image: url("login_background.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 40px; 
            width: 250px; 
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 20px; 
            margin-bottom: 5px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px; 
            margin-bottom: 10px; 
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px; 
        }
       
        input[type="submit"] {
            background-color: #0095f6;
            color: #fff;
            padding: 8px 16px; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px; 
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0077e6;
        }

        .login-link {
            color: #0095f6;
            text-decoration: none;
            font-weight: bold;
        }


    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="registration.php" method="post">
            <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" required>
            <br><br>

            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"   required>
            

            <br><br>

            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a class="login-link" href="login.php">Log In</a></p>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const form = document.querySelector('form');
          const password = document.getElementById('password');
          const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    password.addEventListener('input', function() {
        if (!passwordPattern.test(password.value)) {
            password.setCustomValidity('Password should contain at least 8 characters , at least one uppercase letter, one lowercase letter, one number, and one special character.');
        } else {
            password.setCustomValidity('');
        }
    });

    form.addEventListener('submit', function(event) {
        if (!password.checkValidity()) {
            event.preventDefault();
        }
    });
});
    </script>
</html>



<?php
 include "SQL_connection.php" ; // include il connection al database

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    try {
        // Insert data
        $sql = "INSERT INTO user (firstname, lastname , email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.php");
            exit;
        } else {
            echo "Registration failed.";
        }
    } catch (mysqli_sql_exception $ex) {
        echo "name or email already exists.";
    }

    mysqli_close($conn);
}
 }
?>