<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <header>
        <?php
            session_start();
        ?>
    </header

            <?php
                include "SQL_connection.php";

                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    include "../ruota1/ruta.php";
                }
           
                ?>
        
        

