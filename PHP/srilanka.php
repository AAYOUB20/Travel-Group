<?php
session_start();
include "SQL_connection.php"; 




$sql = "SELECT * FROM query WHERE destination = 'sri lanka'";
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
    <title>Sri Lanka</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="../css/srilanka.css">
</head>

<body>
<?php
include "navbar.php";
?>
<h1>Sri Lanka</h1>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card">
                    <img src="https://www.jacadatravel.com/wp-content/uploads/2017/04/sri-lanka-tea-plantations.jpg" alt="Image 1">
                    <p>Date: <?php echo $dates[0]; ?></p>
                    <p>Price: <?php echo $prices[0]; ?></p>
                    <button class="book-button" >Book</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <img src="https://www.planetware.com/wpimages/2020/01/sri-lanka-best-places-to-visit-kandy.jpg" alt="Image 2">
                    <p>Date: <?php echo $dates[1]; ?></p>
                    <p>Price: <?php echo $prices[1]; ?></p>
                    <button class="book-button" >Book</button>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <img src="https://franks-travelbox.com/wp-content/uploads/2017/11/sri-lanka-der-hocc88hlentempel-von-dambulla-liegt-etwa-150km-occ88stlich-der-hauptstadt-colombo-sri-lanka-er-ist-der-grocc88sste-und-besterhaltene-buddhistische-hocc88hlentempel-des-landes-2048x1365.jpg" alt="Image 3">
                    <p>Date: <?php echo $dates[2]; ?></p>
                    <p>Price: <?php echo $prices[2]; ?></p>
                    <button class="book-button" >Book</button>
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