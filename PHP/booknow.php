<!DOCTYPE html>
<html>
<head>
    <title>Book Your Trip</title>
    <link rel="stylesheet" href="../css/booknow.css">

</head>
<body>

<div class="container">
    <h1>Book Your Trip</h1>
    <form action="booknow.php" method="post">
        <label for="destination">Choose your destination:</label>
        <select name="destination" id="destination">
            <option value="Thailand">Thailand</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Rome">Rome</option>
        </select>
        <br>

        <label for="date">Select a date:</label>
        <select name="date" id="date">
            <option value="10/02/2024">10/02/2024</option>
            <option value="17/02/2024">17/02/2024</option>
            <option value="24/02/2024">24/02/2024</option>
        </select>
        <br>

        <label for="promoCode">Enter your promo code:</label>
        <input type="text" name="promoCode" id="promoCode">
        <br>
        <button>Book Now</button>
    </form>
</div>

<div id="ratingOverlay">
    <div id="ratingContainer">
        <h1>Rate Our App</h1>
        <form action="rating.php" method="post">
    <label for="rating">Rate our app:</label>
    <select name="rating" id="rating">
        <option value="😠">😠</option>
        <option value="😞">😞</option>
        <option value="😐">😐</option>
        <option value="😊">😊</option>
        <option value="😍">😍</option>
    </select>
    <br>
    <button>Submit Rating</button>
</form>
    </div>
</div>
</body>
</html>


<?php
session_start();
include "navbar.php";// including the navbar

include "SQL_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"]; 
    $date = $_POST["date"];
    $promoCode = $_POST["promoCode"];

    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];// prendiamo l'email dell'utente loggato usando il session

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

           
            $defaultDiscountPercentage = 0; // Use a default discount percentage if the promo code is not found

            // Check if the promo code exists in the predefined discounts
            $promoCodeDiscounts = array( 
                "ali" => 10,   
                "era" => 15,   
                "ibra" => 20,  
                "saw" => 25,   
                "unige" => 30  
            );

            // Assign the corresponding discount percentage for the valid promo code
            $discount = isset($promoCodeDiscounts[$promoCode]) ? $promoCodeDiscounts[$promoCode] : $defaultDiscountPercentage;

            // Append the discount percentage to the promo code
            $discountpercentage = "($discount%)";

            // Insert the booking details into the database
            $sql = "INSERT INTO booking (email, destination, date, promoCode) VALUES (?, ?, ?, ?)"; // qua lo mettiamo dati nel database (nota che qua abbiamo messo anche il email , per qua stiamo usando un nuovo database non siamo piu in databse usere siamo in databse booking)

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $email, $destination, $date, $discountpercentage);// mettiamo i dati nel database

                if (mysqli_stmt_execute($stmt)) { 
                    sleep(1);
                    echo "<script>window.onload = function() {
                            document.getElementById('ratingOverlay').style.display = 'flex'; 
                          }</script>";
                }
                 else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error preparing the statement: " . mysqli_error($conn);
            }
        } 
    }

?>



