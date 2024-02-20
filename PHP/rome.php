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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 10px; 
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 200px;
            border: 3px solid green;
            padding: 10px;
            text-align: center;
            background-color: white;
            margin: 5px 10px 10px 10px; 
            border-radius: 20px;
            box-sizing: border-box;
            margin-top: -150px; 
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .back {
            color: white;
            background-color: black;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 30px;
            cursor: pointer;
            z-index: 0;
        }

        .back:hover {
            background-color: green;
        }

        @media only screen and (max-width: 600px) {
            .back {
                font-size: 15px;
            }

            .card {
                text-align: center;
                width: calc(70% - 20px);
            }
        }

        @media only screen and (min-width: 601px) and (max-width: 1024px) {
            .card {
                font-size: 15px;
                width: calc(40% - 20px);
            }
        }

        .book-button {
            cursor: pointer;
            font-style: bold;
            font-size: 17px;
            background-color: black;
            color: white;
        }

        .swiper-button-next,
        .swiper-button-prev {
            position: absolute;
            top: 50%;
            width: 30px;
            height: 30px;
            margin-top: -15px;
            background-size: 30px 30px;
            cursor: pointer;
            z-index: 10;
        }

        .swiper-button-next {
            right: 500px;
            background-image: url('https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/navigation/next.png');
        }

        .swiper-button-prev {
            left: 500px;
            background-image: url('https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/navigation/prev.png');
        }

        .swiper-pagination {
            display: none;
        }
    </style>
</head>

<body>
<?php
include "navbar.php";
?>
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
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    mySwiper.on('reachEnd', function () {
        document.querySelector('.swiper-button-next').style.display = 'none';
        document.querySelector('.swiper-button-prev').style.display = 'block';
    });

    mySwiper.on('reachBeginning', function () {
        document.querySelector('.swiper-button-prev').style.display = 'none';
        document.querySelector('.swiper-button-next').style.display = 'block';
    });

    mySwiper.on('slideChange', function () {
        document.querySelector('.swiper-button-prev').style.display = 'block';
        document.querySelector('.swiper-button-next').style.display = 'block';
    });
});

    </script>
</body>

</html>
