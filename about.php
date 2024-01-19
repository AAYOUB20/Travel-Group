<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .about-us {
            text-align: center;
            padding: 40px;
            background-color: #fff;
            margin: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            color: #555;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            color: #555;
            font-size: 24px;
            margin: 0 10px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "navbar.php"
    ?>

    <section class="about-us">
        <h1>Welcome to Our Traveler Group</h1>
        <p>
            We are a passionate group of travelers dedicated to creating unforgettable local trips for our clients
            every week. Our mission is to ensure our clients are not just satisfied but extremely happy with their
            travel experiences.
        </p>

        <h2>Meet Our Team</h2>
        <ul>
            <li><strong>Ibrahim Hamade</strong></li>
            <li><strong>Ali Ayoub</strong> </li>
            <li><strong>Era Kola</strong></li>
        </ul>

        <p>
            Each member of our team brings a unique set of skills and a shared love for exploration. Together, we
            strive to create memorable journeys that go beyond expectations.
        </p>

        <h2>Our Commitment</h2>
        <p>
            At our traveler group, we are committed to providing personalized and immersive travel experiences. From
            discovering hidden gems in local destinations to fostering a sense of community among our clients, we
            ensure every trip is an adventure to remember.
        </p>

        <!-- Social Media Icons -->
        <div class="social-icons">
            <a href="https://www.instagram.com/braieem" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.tiktok.com/" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
    </section>

</body>

</html>
