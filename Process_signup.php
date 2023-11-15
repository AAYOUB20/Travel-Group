<?
 include "SQL_connection.php" ;

// Check if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssss", $name, $lastname, $username, $email, $hashedPassword);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful
            header("Location: login.html");
            exit;
        } else {
            echo "Registration failed.";
        }
    } catch (mysqli_sql_exception $ex) {
        // Handle the exception, catewhich occurs when a dupli entry is attempted
        echo "Username or email already exists.";
    }

    mysqli_close($conn);
}
?>
