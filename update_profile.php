<?php
include "SQL_connection.php";

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $updatedName = $_POST['editName'];
        $updatedLastname = $_POST['editLastname'];
        $updatedEmail = $_POST['editEmail'];

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "UPDATE user SET name=?, lastname=?, email=? WHERE username=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $updatedName, $updatedLastname, $updatedEmail, $username);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Update failed!";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
?>
