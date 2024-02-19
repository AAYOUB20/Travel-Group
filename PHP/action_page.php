<?php
//queta e utilizata nel project.php per invitare messagi all'admin
include "SQL_connection.php"; // include il connection al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Message'])) {
        $name = $_POST["Name"];
        $email = $_POST["Email"];
        $message = $_POST["Message"];

       
            $query = "INSERT INTO messages (Name, Email, Messages) VALUES (?, ?, ?)";
           if( $stmt = mysqli_prepare($conn, $query)){
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

            if (mysqli_stmt_execute($stmt)) {
                echo "Message sent to admin.";
            } else {
                echo "Error: Unable to execute the query.";
            }
        }
        else {
            echo "Error preparing the statement: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all fields in the form.";
    }
}

mysqli_close($conn);
?>
