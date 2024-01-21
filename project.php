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

        .header {
            background-image: url("foto/cover1.jpg");
            background-size: cover;
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
            color: black;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 18px;
            color: black;
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
            background-color: transparent;
            font-weight: bold;
            border: 2px solid black;
            margin-top: 20px;
            color: black;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            font-family: cursive;
            transition: background-color 0.5s ease, color 0.5s ease;
        }

        button:hover {
            background-color: white;
            color: black;
        }

        .second-background {
            background-image: url("foto/cover2.webp");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px;
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
            font-size: 20px;
            color: black;
        }

        .contact.section {
            background-image: url("city.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-container {
            max-width: 60%;
            margin: 0 auto;
            padding: 20px;
            background-color: black;
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h4 {
            margin-top: 0;
            font-size: 24px;
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

        .info-section input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: darkgrey;
            color: white;
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

        #wheel-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        #wheel-modal {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 80%;
            max-height: 80%;
            overflow: auto;
        }

        #wheel-modal iframe {
           width: 100%;
           height: 100%;
           border: none;
           margin-top: 20px; 
        }

        #closeWheelButton {
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

    </style>

    <script>
        function openWheelModal() {
            document.getElementById('wheel-overlay').style.display = 'flex';
        }

        function closeWheelModal() {
            document.getElementById('wheel-overlay').style.display = 'none';
        }
    </script>
</head>

<?php
include "navbar.php";
?>

<body>
    <div class="header">
        <h2>Social Expert Traveler Group</h2>
        <h1>Trust Our Experience</h1>
        <button id="bookNowButton">Book Now</button>
        <button id="discount" onclick="openWheelModal()">Click here to get a discount</button>
    </div>
    <p id="coloredText">
        WE ARE: A Professional Group Who Organize Trips Over The World, Every Week in different countries Explore A Different
        Place.
    </p>
    <div id="wheel-overlay">
        <div id="wheel-modal">
            <iframe src="html/index.html" frameborder="0"></iframe>
            <button id="closeWheelButton" onclick="closeWheelModal()">Close Wheel</button>
        </div>
    </div>
    <!-- //source :*from google*   -->
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

    <div class="second-background">
        <h2>This week trips</h2>
        <div class="image-container">
            <figure>
                <a href="html/thailand_page.html">
                    <img src="foto/Thailand.jpg" alt="Thailand">
                    <figcaption>Thailand</figcaption>
                </a>
            </figure>
            <figure>
                <a href="html/sirilanka_page.html">
                    <img src="foto/Siri Lanka.jpg" alt="Sirilanka">
                    <figcaption>Sirilanka</figcaption>
                </a>
            </figure>
            <figure>
                <a href="html/roma_page.html">
                    <img src="foto/Roma.jpg" alt="Roma">
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
            <li style="display: inline; margin-right: 20px;"><a href="html/privacy_policy.html" style="text-decoration: none; color: white;">Privacy Policy</a></li>
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
