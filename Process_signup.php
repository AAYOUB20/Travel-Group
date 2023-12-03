
<?php
 include "SQL_connection.php" ;

 
if ($_POST) {
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    try {
        // Insert data
        $sql = "INSERT INTO user (name, lastname ,username, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "sssss", $name, $lastname, $username, $email, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.html");
            exit;
        } else {
            echo "Registration failed.";
        }
    } catch (mysqli_sql_exception $ex) {
        echo "Username or email already exists.";
    }

    mysqli_close($conn);
}
?>
