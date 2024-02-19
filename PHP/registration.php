<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/registration.css">
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <p>crea il tuo account in pochi secondi</p>
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
        <p>hai gia un account ? <a class="login-link" href="login.php">Log In</a></p>
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



</html>




<?php
 include "SQL_connection.php" ;

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $balance=0;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    try {
        $sql = "INSERT INTO user (firstname, lastname , email, password , balance) VALUES (?, ?, ?, ? , ?)";
 
        $stmt = mysqli_prepare($conn, $sql);//prepare the sql statement

        mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $hashedPassword , $balance);//bind the parameters to the sql statement
  

        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.php"); // se il dati sono stati inseriti correttamente allora si reindirizza alla pagina di login
            exit;
        } else {
            echo "Registration failed.";// se il dati non sono stati inseriti correttamente allora si stampa un messaggio di errore
        }
    } catch (mysqli_sql_exception $ex) {
        echo "name or email already exists.";// se il nome o l'email esistono gia allora si stampa un messaggio di errore
    }
    mysqli_stmt_close($stmt);//close the statement
    mysqli_close($conn);//close the connection
}
 }
?>