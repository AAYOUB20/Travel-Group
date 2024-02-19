<?php
session_start();
include "admin_check.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- per adattare la pagina a tutti i dispositivi perche se cambiano dipendo dal grandezza dell schermo -->
    <link rel="stylesheet" href="../css/project.css"> 

    <title>Traveling</title>

</head>

<body>
    <header>
        <?php
        include "navbar.php"; // include the navbar nella head della pagina
        ?>
    </header>
    <div class="intro">
        <h2>Social Expert Traveler Group</h2><!-- titolo della pagina h2 e sollo per scrivere letter grande ma pi piccolo di h1 -->
        <h1>Trust Our Experience</h1>
        <button id="bookNowButton">Book Now</button><!-- bottone per prenotare un viaggio quando se digita se applica il funzion Book now button -->
        <button id="discount" onclick="openoferta()">Click here to get a discount</button> <!-- bottone per ottenere uno sconto quando vienne digitata se applica il funzione open oferta  -->
    </div>
    <script>
        document.getElementById('bookNowButton').addEventListener('click', function () {
            <?php
            if (isset($_SESSION['email'])) {
                echo 'window.location.href = "booknow.php";';//nel caso in cui l'utente è loggato quando clicca sul bottone "book now" viene reindirizzato alla pagina booknow.php
            } else {
                echo 'var confirmRedirect = confirm("You need to log in first. Continue or cancel?");
                        if (confirmRedirect) {
                            window.location.href = "login.php";
                        }';
            }
            ?>
        });
    
        function openoferta() {
            <?php
            if (isset($_SESSION['email'])) { // se l'utente è loggato allora si apre la pagina di sconto 
                echo 'window.location.href = "ruota.php";';// link al file ruota.php
            }
             else { // altrimenti si apre un messaggio che dice che bisogna loggarsi per ottenere lo sconto
                echo 'var confirmRedirect = confirm("You need to log in first. Continue or cancel?"); 
                            window.location.href = "login.php";
                        }';
            }

            ?>
        };
    
    </script>
    <section id="about" class="about">
     <div class="about_in_home">
        <div class="text-about">
            <h3>About US</h3>
            <p id="coloredText">
                At Traveler Group, we're not just travel organizers; we're passionate globetrotters dedicated to crafting unforgettable experiences around the world. Driven by a deep thirst for exploration and cultural immersion, we curate weekly escapes to diverse destinations, igniting your wanderlust and enriching your life with every journey.
            </p>
            <a href="about.php">More about ...</a>
        </div>
        <img src="../foto/image_2.jpeg" alt=""> 
    </div>
    </section>
    <script> // questi sciption e per colorare la prima lettera di ogni parola in un colore diverso
        function colorFirstCharacters() {
            const paragraph = document.getElementById("coloredText");// prende il paragrafo con id "coloredText"
            const words = paragraph.textContent.split(" ");// divide il testo in parole
            const coloredWords = words.map(word => {// per ogni parola nel testo
                if (word.length > 0) {
                    return `<span class="colored">${word[0]}</span>${word.slice(1)}`;// colora la prima lettera di ogni parola
                }
                return "";
            });
            paragraph.innerHTML = coloredWords.join(" ");// unisce le parole colorate
        }

        colorFirstCharacters();
    </script>


    <div class="widget-button">
        <img src="../foto/live_chat.png" alt="contact us ">
        <div class="widget-icons">
            <img class="widget-icon" src="../foto/icon_whatsapp.png" alt="WhatsApp" onclick="openWhatsApp()">
            <img class="widget-icon" src="../foto/icon_instagram.png" alt="Telegram" onclick="openTelegram()">
        </div>
    </div>
    <script>
        function openWhatsApp() {
            window.open('https://wa.me/393517267976', '_blank');
        }

        function openTelegram() {
            window.open('YOUR_TELEGRAM_LINK', '_blank');
        }
    </script>
    <div class="second-background">
        <h2>This week trips</h2>
        <div class="image-container">
            <figure>
                <a href="Thailand.php">
                    <img src="../foto/Thailand.jpg" alt="Thailand" >
                    <figcaption>Thailand</figcaption>
                </a>
            </figure>
            <figure>
                <a href="srilanka.php">
                    <img src="../foto/Siri Lanka.jpg" alt="Sirilanka">
                    <figcaption>Sirilanka</figcaption>
                </a>
            </figure>
            <figure>
                <a href="rome.php">
                    <img src="../foto/Roma.jpg" alt="Roma">
                    <figcaption>Roma</figcaption>
                </a>
            </figure>
        </div>
    </div>



    <section id="contact" class="section">
        <div class="form-container">
            <h4>Contact Us</h4>
            <hr>
            <form action="action_page.php" method="POST">
                <div class="info-section">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="Name" required>
                </div>
                <div class="info-section">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="Email" required>
                </div>
                <div class="info-section">
                    <label for="message">Message</label>
                    <input type="text" id="message" name="Message" required>
                </div>
                <button type="submit" class="button">Send Message</button>
            </form>
        </div>
    </section>

    <footer style="background-color: #333; color: white; text-align: center; padding: 20px;">
        <p style="font-size: 18px; margin: 0;">&copy; 2023 Travel Group</p>
        <ul style="list-style: none; padding: 0;">
            <li style="display: inline; margin-right: 20px;"><a href="privacy_policy.html" style="text-decoration: none; color: white;">Privacy Policy</a></li>
            <li style="display: inline;"><a href="#" style="text-decoration: none; color: white;">Terms of Service</a></li>
        </ul>
    </footer>

    <script>
       /* window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('fixed');
            } else {
                navbar.classList.remove('fixed');
            }
        });*/
    </script>

</body>

</html>
