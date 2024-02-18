<?php
session_start();
include "SQL_connection.php"; 

$sql = "SELECT * FROM query WHERE destination = 'Rome'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row_query = mysqli_fetch_assoc($result);
    $destination = $row_query['destination'];
    $dates = json_decode($row_query['date']);
    $prices = json_decode($row_query['price']);
} else {
    $destination = "N/A";
    $dates = [];
    $prices = [];
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rome</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/rome.css"> 
</head>

<body>
    <a href="project.php"><button class="back">Back Home</button></a>
    <h1>Rome</h1>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card">
                    <img src="https://th.bing.com/th/id/R.80e6b3a518b346f780765e31cadac3f0?rik=Bl50elVZk5W9fw&riu=http%3a%2f%2ftraveldigg.com%2fwp-content%2fuploads%2f2016%2f05%2fColosseum-Photography.jpg&ehk=ur%2f0Y%2b9nXJUjyQaxWD6Zl555nZ7hdmVIT5h95013QY8%3d&risl=&pid=ImgRaw&r=0"
                        alt="Image 1">
                    <p>Date: <?php echo $dates[0]; ?></p>
                    <p>Price: <?php echo $prices[0]; ?></p>
                    <button class="book-button" onclick="book('<?php echo $destination; ?>', '<?php echo $dates[0]; ?>', '<?php echo $prices[0]; ?>')">Book</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <img src="https://th.bing.com/th/id/R.4db521bb8c58be68f59ac7620529bb19?rik=Jt6A6Km%2bSv5TnA&pid=ImgRaw&r=0"
                        alt="Image 2">
                    <p>Date: <?php echo $dates[1]; ?></p>
                    <p>Price: <?php echo $prices[1]; ?></p>
                    <button class="book-button" onclick="book('<?php echo $destination; ?>', '<?php echo $dates[1]; ?>', '<?php echo $prices[1]; ?>')">Book</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <img src="https://www.wallpaperup.com/uploads/wallpapers/2013/07/30/125364/afd2f789efbdbb65de050872a480f0cb.jpg"
                        alt="Image 3">
                    <p>Date: <?php echo $dates[2]; ?></p>
                    <p>Price: <?php echo $prices[2]; ?></p>
                    <button class="book-button" onclick="book('<?php echo $destination; ?>', '<?php echo $dates[2]; ?>', '<?php echo $prices[2]; ?>')">Book</button>
                </div>
            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <script>
        document.querySelectorAll('.book-button').forEach(function (button) {
            button.addEventListener('click', function () {
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
        });

        document.addEventListener('DOMContentLoaded', function () {
            var mySwiper = new Swiper('.swiper-container', {
                direction: 'vertical',
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
</body>
</html>
