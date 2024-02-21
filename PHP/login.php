
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../css/login.css"> 
</head>
<body>
    
    <main>
        <section class="form">
           
            <h1 class="form__title">Log in to your Account</h1><!-- h1 e solo per scriver lettere in modalita piu grande il class se trova nell file css per indicare colore -->
            <p class="form__description">Welcome back! Please, enter your information</p><!-- p e per scrivere testo in modalita normale il class se trova nell file css per indicare colore ..-->


            <form action="login.php" method="POST"><!-- action e per indicare il file php che si deve eseguire quando si clicca sul bottone submit e method e per indicare il metodo post di invio dei dati -->
                <label class="form-control__label" for="email">email</label><!-- label e per scrivere il testo sopra l'input e class  e per indicare il colore del testo -->
                <input type="text" class="form-control" id="email" name="email" required>
        
                <label class="form-control__label" for="pass">Password</label><!-- label e per scrivere il testo sopra l'input e class  e per indicare il colore del testo -->
                <div class="password-field">
                    <input type="password" class="form-control"   name="pass" required>
                   
                </div>
                <div class="password__settings">
                    <label class="password__settings__remember" for="rememberMe">
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <span class="custom__checkbox">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>                              
                        </span>
                        Remember me
                    </label>
        
                    <a href="../html/forget_password.html">Forgot Password?</a><!-- link per recuperare la password ma in realta non funziona per link falso  -->
                </div>
        
                <button type="submit" class="form__submit" id="submit">Log In</button>
                <a href="project.php"><button type="button" class="home" id="home">Home page</button></a>

            </form>
        
            <p class="form__footer">
                Don't have an account?<br> <a href="registration.php">Create an account</a> 
            </p>
        </section>
        
        <section class="form__animation">
            <div id="ball">
                <div class="ball">
                    <div id="face">
                        <div class="ball__eyes">
                            <div class="eye_wrap"><span class="eye"></span></div>
                            <div class="eye_wrap"><span class="eye"></span></div>
                        </div>
                        <div class="ball__mouth"></div>
                    </div>
                </div>
              </div>
              <div class="ball__shadow"></div>
        </section>
    </main>
    <script src="main.js"></script>
</body>
</html>


<?php
include "SQL_connection.php"; // include il connection al database

session_start(); // inizia la sessione questo e importante per salvare i dati dell'utente loggato

if ($_POST) { // se i dati sono stati inviati request method post dalla form 
    $email = $_POST["email"];// prende l'email e la password dalla form
    $password = $_POST["pass"];

    if (!$conn) { // se la connessione fallisce
        die("Database connection failed: " . mysqli_connect_error());// stampa controllare se la connessione al database e stata fatta correttamente
    }

    $sql = "SELECT email, password, remember_token FROM user WHERE email = ?"; // seleziona l'email e la password dalla tabella user dove l'email e uguale a quella inserita nella form e l'inverso di  quello che l'abiamo fatto nella registrazione qua abbiamo l'email  va nell  datbase vediamo se esiste o no e la password  
    $stmt = mysqli_prepare($conn, $sql);// prepara il connesione e il databse   
    mysqli_stmt_bind_param($stmt, "s", $email); // bind param per il statement vado a cercare l'email nel database

    if (!mysqli_stmt_execute($stmt)) {
        die("Error executing prepared statement: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_store_result($stmt);// salvo il risultato del cerca dell email nel database

    if (mysqli_stmt_num_rows($stmt) == 1) { // se l'email esiste nell database 
        mysqli_stmt_bind_result($stmt, $dbEmail, $dbPassword, $dbRememberToken);// prende l'email e la password dal database e lo salva in queste variabili $db email e $db password
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $dbPassword)) { // se la password inserita corrisponde a quella nel database


            if (isset($_POST['rememberMe'])) { // mel caso se il utente ha cliccato sul checkbox remember me 
                $token = hash("sha256", random_bytes(16));// generazione di un cookies token random
                $expiration_time_unix = time();// unlimited time
                $expiration_time_mysql = date('Y-m-d H:i:s', $expiration_time_unix);// variabile per salvare il tempo di scadenza del token in db 

                setcookie("remember_token", $token, $expiration_time_unix, '/', '', false, true); // set del cookies cosi se nasce il cookies e il utente chiude il browser e poi ritorna il cookies e ancora esiste

                $updateStmt = mysqli_prepare($conn, "UPDATE user SET remember_token = ?, expiration_time = ? WHERE email = ?"); // questa per fare update per il databse ,  perche adesso vogliamo salvare il cookies e il expire time nel database
                mysqli_stmt_bind_param($updateStmt, "sss", $token, $expiration_time_mysql, $email);// bind paramete per il update statement 

                if (!mysqli_stmt_execute($updateStmt)) {
                    die("Error updating user data: " . mysqli_stmt_error($updateStmt));
                }

                mysqli_stmt_close($updateStmt);
            }
            $_SESSION["email"] = $email; // salva l'email nella sessione questa qua e il inizio della sessione cosi doppo durante lo uso dell sito noi sappiamo che il sessione ugualle al emai 

            sleep(0.7);//dlai per 0.7 secondi

            header("Location: project.php");// reindirizzamento alla pagina principale
            exit;
        } else {
            die("Authentication failed: Invalid email or password");// se la password non corrisponde
        }
    } else {
        echo "Authentication failed: Invalid email or password.";// se l'email non corrisponde
    }

    mysqli_stmt_close($stmt); // questa close e solo per chiudere il statement

    mysqli_close($conn);
}
?>
