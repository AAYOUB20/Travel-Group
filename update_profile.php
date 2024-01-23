<?php
include "SQL_connection.php";   // include il connection al database

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        $updatedName = $_POST['firstname'];
        $updatedLastname = $_POST['lastname'];
        $updatedEmail = $_POST['email'];

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Update user table
        $query = "UPDATE user SET firstname=?, lastname=?, email=? WHERE email=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $updatedName, $updatedLastname, $updatedEmail, $email);
        mysqli_stmt_execute($stmt);

        $query1 = "UPDATE booking SET email=? WHERE email=?";
        $stmt1 = mysqli_prepare($conn, $query1);
        mysqli_stmt_bind_param($stmt1, "ss", $updatedEmail, $email);
        mysqli_stmt_execute($stmt1);

        if (mysqli_stmt_affected_rows($stmt) > 0 || mysqli_stmt_affected_rows($stmt1) > 0) {
            $_SESSION['email'] = $updatedEmail;
            
            header("Location: show_profile.php");
            exit();
        } else {
            echo "Update failed!";
        }

        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt1);
        mysqli_close($conn);
    }
}
?>

