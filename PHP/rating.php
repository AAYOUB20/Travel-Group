<?php
session_start();
include "SQL_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST["rating"];

    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE booking SET rating = ? WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $rating, $email);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: project.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing the statement: " . mysqli_error($conn);
        }
    } else {
        echo "Database connection not found in the session.";
    }

    mysqli_close($conn);
}
?>
