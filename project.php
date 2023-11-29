<!DOCTYPE html>
<html>
<head>
    <title>Traveling</title>
    <style>
        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333;
            overflow: hidden;
        }

        ul.navbar li {
            float: right;
        }

        

        ul.navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.navbar a:hover {
            background-color: #555555;
        }
     

         .subnav {
             display: none;
             position: absolute;
             background-color: #333;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
              z-index: 1;
            }
            
         .username-item:hover .subnav {
             display: block;
            }
        
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Container for the header */
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
            padding: 50px;
        }
        .second-background .h2{
            background-color: transparent;
            border-style: pointer;
        }
        .image-container {
            display: flex;
            justify-content: space-between; 
            margin-top: 20px; 
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
            margin-top: px;
            font-style: bold;
            font-size: 20px;
            color: black;
        
        }
        
    </style>
</head>
<body>

<ul class="navbar">
  
<li><a href="index.php">Home</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="about.php">About</a></li>
    <li class="username-item">
        <?php
           session_start();

        if (isset($_SESSION['username'])) {
            echo '<a class="username" href="#">' . $_SESSION['username'] . '</a>';
            echo '<div class="subnav">';
            echo '<a href="profile.php">profile</a>';
            echo '<a href="logout.php">Logout</a>';
           echo '</div>';
        } else {
            echo '<a href="login.html">Login</a>';
        }
        ?>
         
    </li>
</ul>

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
                <img src="Thailand.jpg" alt="Thailand">
                <figcaption>Thailand</figcaption>
            </figure>
            <figure>
                <img src="Siri Lanka.jpg" alt="Sirilanka">
                <figcaption>Sirilanka</figcaption>
            </figure>
            <figure>
                <img src="Roma.jpg" alt="Roma">
                <figcaption>Roma</figcaption>
            </figure>
        </div>
    </div>
 
    <script>
        //prendiamo l ID e faciamo on click fx qua 
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
<footer style="background-color: #333; color: white; text-align: center; padding: 20px;">
    <p style="font-size: 18px; margin: 0;">&copy; 2023 Travel Group</p>
    <ul style="list-style: none; padding: 0;">
        <li style="display: inline; margin-right: 20px;"><a href="#" style="text-decoration: none; color: white;">Privacy Policy</a></li>
        <li style="display: inline;"><a href="#" style="text-decoration: none; color: white;">Terms of Service</a></li>
    </ul>
</footer>


</body>
</html>
