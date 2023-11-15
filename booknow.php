<?php
 include "SQL_connection.php" ;

session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"];
    $date = $_POST["date"];
    $promoCode = $_POST["promoCode"];


    
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];



    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO booking (username, destination, date, promoCode) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $destination, $date, $promoCode);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "Booking successful!";
            sleep(1);
            header("Location: project.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error preparing the statement: " . mysqli_error($conn);
    }
    
    } else {
        echo "Database connection not found in the session.";
    }
}
