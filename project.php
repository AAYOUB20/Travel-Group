
<?php
   session_start();
   include "admin_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Traveling</title>
    
    <style>
        
   
        body {
            display : flex ;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-image: url("cover1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 30px;
            height: 500px; 
        }

        h1 {
            font-style: bold;
            color: black;
        }

        h2 {
            margin-top: 10px;
            font-size: 18px;
            color: black;
        }
        p {
         font-style: bold ;
         text-align : center;
         position : right ;

        }
        .colored {
          color: Green;
          font-weight: bold; 
        }

        button {
            background-color: transparent;
            font-weight: bold;
            border-style: solid;
            margin-top: 20px;
            color: black;
            cursor:pointer;
        }

        .second-background {
            background-image: url("cover2.webp");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding:50px;
        }
        .second-background .h2{
            background-color: transparent;
            border-style: pointer;
        }

        @media only screen and (min-width: 769px) {
            .image-container {
                width: 40%;
                display: flex;
                justify-content: space-around;
                align-items: center;
                margin-top: 20px;
            }

            .image-container figure {
                flex: 0 0 30%;
                max-width: 200px;
                text-align: center;
            }

            .image-container img {
                width: 100%;
                max-width: 100%;
            }
        }
          #wrap {
              width: 1020px;
          }

        @media only screen and (max-width: 768px) {
            .image-container {

                width: 80%;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
            }
          #wrap{
            width:500px;
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
            }
        }

        img {
            --f: .1;
            --r: 10px;
            --_f: calc(100% * var(--f));
            --_a: calc(90deg * var(--f));

            width: 250px;
            aspect-ratio: calc(1 + var(--f));
            object-fit: cover;
            clip-path: inset(0 var(--_f) 0 0 round var(--r));
            transform: perspective(400px) rotateY(0);
            transition: 0.5s;
            cursor: pointer;
        }

        img:hover {
            clip-path: inset(0 0 0 var(--_f) round var(--r));
            transform: perspective(400px) rotateY(calc(-1 * var(--a)));
        }

        figure {
            text-align: center;
        }

        figcaption {
            margin-top : 1px;
            font-style: bold;
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
          max-width: 40%; 
          max-height: 50%;
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
        
        .contact-info {
            display: flex;
            flex-direction : row;
            max-width: 50%;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin: 0 10px;
            color: black;
            background-color: darkgray;
            font-family: Arial, sans-serif;


        }

        .contact-item li {
            list-style-type: none;
            font-size: 16px;
            margin-left: 5px;
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
        }

        .button:hover {
            background-color: #45a049;
        }
        .contact-item img {
            height: 20px; 
            margin-right: 5px; 
        }
        
    </style>
   
  
</head>
<?php
include "navbar.php";
?>
<body>
    <div class="header">
        <h2>Social Expert Traveler Group</h2>
        <h1>Trust Our Experience</h1>
        <button id="bookNowButton">Book Now</button>
    </div>
    <p id="coloredText">
    WE ARE : A Professional Group Who Organize Trips Over The World, Every Week in different countries Explore A Different Place.
</p>

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
        <h2> This week trips
        </h2>
        <div class="image-container">
        <figure>
            <a href="thailand_page.html">
                <img src="Thailand.jpg" alt="Thailand">
                <figcaption>Thailand</figcaption>
            </a>
        </figure>
        <figure>
            <a href="sirilanka_page.html">
                <img src="Siri Lanka.jpg" alt="Sirilanka">
                <figcaption>Sirilanka</figcaption>
            </a>
        </figure>
        <figure>
            <a href="roma_page.html">
                <img src="Roma.jpg" alt="Roma">
                <figcaption>Roma</figcaption>
            </a>
        </figure>
        </div>
    </div>
 
    <script>
        
    document.getElementById('bookNowButton').addEventListener('click', function() {
        <?php
        if (isset($_SESSION['username'])) {
            echo 'window.location.href = "booknow.html";';
        } else {
            echo 'var confirmRedirect = confirm("You need to log in first. Continue or cancel?");
            if (confirmRedirect) {
                window.location.href = "login.html";
            }';
        }
        ?>
    });
</script>
<section  id="contact" class="section">
    <div class="form-container">
        <h4>Contact Us</h4>
        <hr>
        <form action="action_page.php"  method="POST">
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
        window.addEventListener('scroll', function() {
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
