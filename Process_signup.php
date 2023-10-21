<?php
// Check if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Database connection parameters (update with your database credentials)
    $dbHost = "localhost";
    $dbUser = "prova1";
    $dbPass = "123";
    $dbName = "user";

    // Establish a database connection
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    try {
        // Insert data
        $sql = "INSERT INTO user (name, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashedPassword);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful
            header("Location: login.html");
            exit;
        } else {
            echo "Registration failed.";
        }
    } catch (mysqli_sql_exception $ex) {
        // Handle the exception, which occurs when a duplicate entry is attempted
        echo "Username already exists. Please choose a different username.";
    }

    mysqli_close($conn);
}
?>
