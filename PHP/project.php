<?php
session_start();
include "admin_check.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveling</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .intro {
            background-image: url("../foto/cover1.jpg");
            background-size: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
            height: 500px;
            text-align: center;
        }

        h1 {
            font-weight: bold;
            color: blueviolet;
            margin-bottom: 10px;
        }

        h2 {
            color: blueviolet;
        }

        p {
            font-weight: bold;
            text-align: center;
        }

        .colored {
            color: Green;
            font-weight: bold;
        }

        button {
            background-color: rgba(0, 0, 0, 0.7);
            font-weight: bold;
            border: 1px solid hsla(0, 0%, 100%, 1);
            margin-top: 20px;
            color: hsla(0, 0%, 100%, 1);
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            font-family: cursive;
            transition: background-color 0.5s ease, color 0.5s ease;
            outline: none;
        }

        button:hover {
            background-color: white;
            color: black;
        }
        .about_in_home{
            width: 100%;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 80px;
        }

        .about_in_home .text-about {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .about_in_home .text-about h3{
            font-weight: bold;
            font-size: 44px;
            line-height: 32px;
            letter-spacing: -0.06em;
        }

        .about_in_home .text-about p{
            font-style: normal;
            font-stretch: normal;
            font-weight: normal;
            font-size: 26px;
            line-height: 24px;
            text-align: left;
        }


        .about_in_home img{

            width : 35%;
            border-radius: 10px;
        }

        #chat-button {
            display: flex;
            align-items: center;
            margin: 10px;
        }

        #chat-button img {
            height: 30px;
            margin-right: 10px;
            cursor: pointer;
        }

        .second-background {
            background-image: url("../foto/cover2.jpg");
            background-color: hsla(0, 0%, 100%, 1);
            background-size: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 80px;
        }

        .image-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .image-container figure {
            flex: 0 0 45%;
            margin: 10px;
            max-width: 200px;
            text-align: center;
        }

        .image-container img {
            width: 100%;
            max-width: 100%;
            aspect-ratio: 1.2;
            object-fit: cover;
            clip-path: inset(0 10% 0 0 round 10px);
            transition: 0.5s;
            cursor: pointer;
        }

        .image-container img:hover {
            clip-path: inset(0 0 0 10% round 10px);
        }

        figcaption {
            margin-top: 1px;
            font-weight: bold;
            font-size: 30px;
            color: black;
        }

        .section {
            background-color: hsla(0, 0%, 100%, 1);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin-bottom: 30px;
        }

        .form-container {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
            background-color: black;
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }



        .form-container h4 {
            margin-top: 0;
            font-size: 30px;
            color: whitesmoke;
            text-align: center;
        }

        .info-section {
            margin-bottom: 16px;
        }

        .info-section label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: darkgray;
        }

        .info-section input{
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: darkgrey;
            color: white;
        }

        .info-section #message {
            height: 200px;
        }


        .button {
            background-color: blueviolet;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            font-family: cursive;
            transition: background-color 0.5s ease, color 0.5s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

        #discount {
            font-size: 20px;
            margin-top: 10px;
        }

        #bookNowButton {
            font-size: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin: 0 10px;
            color: black;
            background-color: darkgray;
        }

        .contact-item li {
            list-style-type: none;
            font-size: 16px;
            margin-left: 5px;
        }

        .contact-item img {
            height: 20px;
            margin-right: 5px;
        }

        #fragment-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px);
}

#fragment-modal {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    max-width: 80%;
    max-height: 80%;
    overflow: auto;
}

#fragment-modal iframe {
   width: 100%;
   height: 100%;
   border: none;
   margin-top: 20px; 
}

#closefragment {
    background-color: black;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
    font-family: cursive;
    transition: background-color 0.5s ease, color 0.5s ease;
}


        .widget-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: transparent;
            border: none;
            border-radius: 5px;
            padding: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .widget-icons {
            display: none;
            flex-direction: column;
            gap: 10px;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            
        }

        .widget-icon {
            height: 30px;
            cursor: pointer;
        }

        .widget-button:hover .widget-icons {
            display: flex;
        }


        @media (max-width: 1024px) {
            .intro {
                background-size: cover;
                height: 70vh;
                background-position: top;
            }
            .widget-button img {
                height: 40px; 
            }

            .second-background {
                background-size: cover;
            }

            .section {
                background-size: cover;
            }

            .about_in_home img {
                width: 40%;
                border-radius: 10px;
            }
        } 
        

        @media (max-width: 499px) {
            .navbar {
                background-color: #333;
                color: white;
            }

            .intro {
                width: 100%;
                margin: 0;
                display: flex;
                background-position: top;
                background-size: cover;
                height: 700px;
            }

            .intro h2,
            h1 {
                margin: 0;
                padding: 0;
                font-size: 25px;
            }

            .about_in_home {
                flex-direction: column;
                padding: 20px 15px;
                margin: 0;
                height: auto;
                width: 100%;
            }

            .about_in_home .text-about {
                width: 100%;
                display: flex;
                flex-direction: column;
            }

            .about_in_home .text-about p {
                font-size: 25px;
                line-height: 25px;
                width: 100%;
            }

            .about_in_home .text-about h3 {
                text-align: center;
                margin-bottom: 16px;
            }

            .about_in_home img {
                width: 100%;
                height: auto;
            }

            .second-background h2 {
                font-weight: bold;
                font-size: 35px;
                line-height: 25px;
                letter-spacing: -0.06em;
            }

            .second-background {
                padding: 30px 20px;
                display: flex;
                width: 100%;
            }

            .image-container {
                margin-top: 20px;
                flex-direction: column;
            }

            .image-container figure {
                margin: 10px;
                min-width: 100%;
                text-align: center;
            }

            footer {
                background-color: #333;
                color: white;
                text-align: center;
                padding: 20px;
                width: 100%;
            }

            .section {
                min-width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 10px;
            }

            .form-container {
                width: 100%;
                margin: 0 auto;
                padding: 20px;
                background-color: black;
                color: white;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>

<body>
    <header>
        <?php
        include "navbar.php";
        include "sconto_check.php";

        ?>
    </header>
    <div class="intro">
        <h2>Social Expert Traveler Group</h2>
        <h1>Trust Our Experience</h1>
        <button id="bookNowButton">Book Now</button>
        <button id="discount" onclick="openfragment()">Click here to get a discount</button>
    </div>
    <script>
        function openfragment() {
            document.getElementById('fragment-overlay').style.display = 'flex';
        }

        function closefragment() {
            document.getElementById('fragment-overlay').style.display = 'none';
        }
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
        <img src="https://th.bing.com/th/id/R.48848c07829ed9fbb312540f3628ae85?rik=vItiarjuto7uXg&pid=ImgRaw&r=0" alt="">
    </div>
    </section>
    <script>
        function colorFirstCharacters() {
            const paragraph = document.getElementById("coloredText");
            const words = paragraph.textContent.split(" ");
            const coloredWords = words.map(word => {
                if (word.length > 0) {
                    return `<span class="colored">${word[0]}</span>${word.slice(1)}`;
                }
                return "";
            });
            paragraph.innerHTML = coloredWords.join(" ");
        }

        colorFirstCharacters();
    </script>
    <div id="fragment-overlay">
        <div id="fragment-modal">
            <iframe src="index.html" frameborder="0"></iframe>
            <button id="closefragment" onclick="closefragment()">Close </button>
        </div>
    </div>

    <div class="widget-button">
        <img src="https://cdn-icons-png.flaticon.com/128/2936/2936956.png" alt="contact us ">
        <div class="widget-icons">
            <img class="widget-icon" src="https://cdn-icons-png.flaticon.com/512/4494/4494494.png" alt="WhatsApp" onclick="openWhatsApp()">
            <img class="widget-icon" src="https://cdn-icons-png.flaticon.com/128/1603/1603076.png" alt="Telegram" onclick="openTelegram()">
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

    <script>
        document.getElementById('bookNowButton').addEventListener('click', function () {
            <?php
            if (isset($_SESSION['email'])) {
                echo 'window.location.href = "booknow.php";';
            } else {
                echo 'var confirmRedirect = confirm("You need to log in first. Continue or cancel?");
                        if (confirmRedirect) {
                            window.location.href = "login.php";
                        }';
            }
            ?>
        });
    </script>

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
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('fixed');
            } else {
                navbar.classList.remove('fixed');
            }
        });
    </script>

</body>

</html>
