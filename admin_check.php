<?php
include "SQL_connection.php"; 

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT admin FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $admin);
        mysqli_stmt_fetch($stmt);
        $_SESSION['admin'] = $admin; 
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
