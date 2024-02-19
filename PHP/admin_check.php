<?php
include "SQL_connection.php"; // include il file SQL_connection.php per collegare al database

if (isset($_SESSION['email'])) { // se l'utente è loggato allora si apre la pagina di sconto ( questa che nata doppo il logi)
    $email = $_SESSION['email'];// e qua comincia il uso dell session che noi facciamo l'inverso di quello che era nell login ($session['email'] = $email) qua prendiamo il valore di sessione e lo diamo a email 

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());// se la connessione al database fallisce stampa questo messaggio
    }

    $query = "SELECT admin FROM user WHERE email = ?";// seleziona l'admin dalla tabella user dove l'email e uguale all sessione email
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);// qua indico $email (che e la sessione email)
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) { 
        mysqli_stmt_bind_result($stmt, $admin);
        mysqli_stmt_fetch($stmt);
        $_SESSION['admin'] = $admin; // se e viene indicatto nell database che l'utente e admin allora creo un altra session che si chiama admin (il vallore della sessione admin qua e uguale a 1 ma non e importante perche e solo per vedere se l'utente e admin o no)
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
