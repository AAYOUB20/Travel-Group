<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  <!-- questa stylsheet l'abbiamo utilizatto per aggiungere l bara giu di instagram facbook ...  -->
  <link rel="stylesheet" href="../css/about.css"> 
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
