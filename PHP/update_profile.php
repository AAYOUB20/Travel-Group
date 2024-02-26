<?php


include "SQL_connection.php";

session_start();// Start the session cosi prendiamo il email

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // se il method e post quella che e il method che nell show_profile.php abbiamo messo nel form per andare a update_profile.php
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email']; //prendiamo la email dalla sessione 

        $updatedName = $_POST['firstname'];//creamo variavibile updatedName e prendiamo il nome che l'utente ha messo nel input doppo che lui ha cambiato
        $updatedLastname = $_POST['lastname'];//uguale come sopra
        $updatedEmail = $_POST['email'];//uguale come sopra

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Update user table
        $sql = "UPDATE user SET firstname=?, lastname=?, email=? WHERE email=?";// faccio l update del nome, cognome e email dell utente nell database dell user ,
        $stmt = mysqli_prepare($conn, $sql);// prepariamo la query
        mysqli_stmt_bind_param($stmt, "ssss", $updatedName, $updatedLastname, $updatedEmail, $email);// bindiamo i nuovi dati che abbiamo preso  con i dati che abbiamo nel database cosi salviamo i nuovi dati nell database
        mysqli_stmt_execute($stmt);// eseguiamo la query

        $sql1 = "UPDATE booking SET email=? WHERE email=?";//anche serve che lo facciamo l'update per il databse booking perche la email e la chiave primaria e se cambiamo la email dobbiamo cambiare anche la email nel database booking 
        $stmt1 = mysqli_prepare($conn, $sql1);// prepariamo la query
        mysqli_stmt_bind_param($stmt1, "ss", $updatedEmail, $email);// bindiamo i nuovi dati che abbiamo preso  con i dati che abbiamo nel database cosi salviamo i nuovi dati nell database booking
        mysqli_stmt_execute($stmt1);// eseguiamo la query

        if (mysqli_stmt_affected_rows($stmt) > 0 || mysqli_stmt_affected_rows($stmt1) > 0) {// se l'update e andato a buon fine
            $_SESSION['email'] = $updatedEmail;// creo il mio nuova sessione con la nuova email
            
            header("Location: show_profile.php");// reindirizziamo l'utente alla pagina show_profile.php cosi lui vede subito il suo nuovo profilo
            exit();
        } else {
            echo "Update failed!";// se l'update non e andato a buon fine
        }

        mysqli_stmt_close($stmt);// chiudiamo la query
        mysqli_stmt_close($stmt1);// chiudiamo la query
        mysqli_close($conn);// chiudiamo la connessione
    }
}
?>

