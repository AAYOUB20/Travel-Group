<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/showprofile.css"> <!-- questo e il nostro style per la pagina showprofile -->
</head>
<body>
    <header>
        <?php
            session_start(); 
            include "navbar.php"; 
        ?>
    </header>
    <div class="profile-container"> <!-- questo e il container per il profilo -->
    <br></br>
    <br></br>
        <div class="profile-info">
            <?php
                include "SQL_connection.php"; 

                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email']; //prendiamo la email dalla sessione

                    if (!$conn) {
                        die("Database connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT firstname, lastname, email FROM user WHERE email = ?"; // cerciamo il nome, cognome e email dell utente 

                    $stmt = mysqli_prepare($conn, $sql);// prepariamo la query
                    mysqli_stmt_bind_param($stmt, "s", $email);// bindiamo la email vediamo se e uguale a quella che abbiamo nel database
                    mysqli_stmt_execute($stmt);// eseguiamo la query
                    mysqli_stmt_store_result($stmt);// memorizziamo il risultato della query

                    if (mysqli_stmt_num_rows($stmt) == 1) { 
                        mysqli_stmt_bind_result($stmt, $first_name, $last_name, $email);
                        mysqli_stmt_fetch($stmt);
                    }

                    mysqli_close($conn);// chiudiamo la connessione
                }

                echo '<h1>Your Profile</h1>';
                echo '<form id="profileForm" method="post" action="update_profile.php">';
                echo '<p><strong>Firstname:</strong> <span id="firstname">' . $first_name . '</span></p>';
                echo '<p><strong>Lastname:</strong> <span id="lastname">' . $last_name . '</span></p>';
                echo '<p><strong>Email:</strong> <span id="email">' . $email . '</span></p>';
                echo '<div class="profile-change">';
                echo '<button type="button" onclick="editProfile()">Change</button>'; 
                echo '</div>';
                echo '<div class="profile-update" style="display: none;">';
                echo '<button type="submit">Update</button>';
                echo '</div>';
                echo '</form>';
            ?>
        </div>
    </div>

    <script>// lo scriviamo d'entro script perche gli funzione sono di javascript
        function editProfile() {
            const nameSpan = document.getElementById('firstname');// qua viene l'utilzzo di id che l'abbiamo messo prima  per il firstname che lo facciamo uguale a nameSPan
            const lastnameSpan = document.getElementById('lastname');
            const emailSpan = document.getElementById('email');

            nameSpan.innerHTML = '<input type="text" name="firstname" id="firstname" value="' + nameSpan.textContent + '" required>';
            lastnameSpan.innerHTML = '<input type="text" name="lastname" id="lastname" value="' + lastnameSpan.textContent + '" required>';
            emailSpan.innerHTML = '<input type="email" name="email" id="email" value="' + emailSpan.textContent + '" required>';

            document.querySelector('.profile-change button').style.display = 'none';
            document.querySelector('.profile-update').style.display = 'block';
        }
    </script>

    <div class="my-booking"><!-- questo e il div per le prenotazioni  -->
             <br></br>
             <h1>  Your Bookings  (●'◡'●): </h1>

        <table id="mybooking">
            <thead>
                <tr><!-- qua scriviamo contenuti colonne del table -->
                    <th>Booking Destination</th> 
                    <th>Booking Date</th>
                    <th>Promo code </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "SQL_connection.php";

                    if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];

                        if (!$conn) {
                            die("Database connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT destination, date, promoCode FROM booking WHERE email = ?";// prendiamo la tabelle destination , date , promo code della  database booking
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $email);// bindiamo la email vediamo se e uguale a quella che abbiamo nel database
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) {// facciamo un while per stampare i dati
                            echo '<tr>';//questa per la tabella
                            echo '<td>' . $row['destination'] . '</td>';
                            echo '<td>' . $row['date'] . '</td>';
                            echo '<td>' . $row['promoCode'] . '</td>';
                            echo '</tr>';
                        }

                        mysqli_close($conn);// chiudiamo la connessione
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

