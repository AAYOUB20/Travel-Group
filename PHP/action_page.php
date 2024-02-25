<?php
//queta e utilizata nel project.php per invitare messagi all'admin
include "SQL_connection.php"; // include il connection al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Message'])) { // se tutti i campi sono stati riempiti
        $name = $_POST["Name"]; // prendiamo il nome usando il for 
        $email = $_POST["Email"];
        $message = $_POST["Message"];

        if (strpos($email, "@") === false) {// questo e per vedere se la email e valida o no nell controllo server side
            echo "<script>alert('email non valido!');
            window.location.href = 'project.php';</script>";
            exit();
        }
        
            $query = "INSERT INTO messages (Name, Email, Messages) VALUES (?, ?, ?)"; 
           if( $stmt = mysqli_prepare($conn, $query)){
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
            

                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Your message has been sent to admin!');
                          window.location.href = 'project.php';</script>";
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
}else {
    header("Location: project.php");
    exit();
}

mysqli_close($conn);
?>
