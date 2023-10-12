<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    // Database connection parameters (update with your database credentials)
    $dbHost = "localhost";
    $dbUser = "prova1";
    $dbPass = "123";
    $dbName = "user";

    // Create a database connection
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    // Check if the connection was successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // SQL query to insert user data into the database
    $sql = "INSERT INTO user (name, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashedPassword);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        // Registration successful
        header("Location: login.html"); // Redirect to login page
        exit;
    } else {
        // Registration failed
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
