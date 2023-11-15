<?php
session_start(); 
 include "SQL_connection.php" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];



    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare a SQL query to retrieve user data based on the provided username
    $query = "SELECT username, password FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $dbUsername, $dbPassword);
        mysqli_stmt_fetch($stmt);

        
        if (password_verify($password, $dbPassword)) {
            // Authentication successful
            $_SESSION["username"] = $username; // Store the username in the session
            sleep(0.7);
            header("Location: project.php");
            exit;
        } else {
            die("Authentication failed: Invalid username or password.");
        }
    }

    echo "Authentication failed: Invalid username or password.";

    mysqli_close($conn);
}
?>
