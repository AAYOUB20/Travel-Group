<?php
include "SQL_connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"];
    $date = $_POST["date"];
    $promoCode = $_POST["promoCode"];

    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Check if the promo code is not empty
        if (!empty($promoCode)) {
            // Use a default discount percentage if the promo code is not found
            $defaultDiscountPercentage = 0;

            // Check if the promo code exists in the predefined discounts
            $promoCodeDiscounts = array(
                "ali" => 10,   // 10%
                "era" => 15,   // 15%
                "ibra" => 20,  // 20%
                "saw" => 25,   // 25%
                "unige" => 30  // 30%
            );

            // Assign the corresponding discount percentage for the valid promo code
            $discount = isset($promoCodeDiscounts[$promoCode]) ? $promoCodeDiscounts[$promoCode] : $defaultDiscountPercentage;

            // Append the discount percentage to the promo code
            $discountpercentage = "$discount%";

            // Insert the booking details into the database
            $sql = "INSERT INTO booking (email, destination, date, promoCode) VALUES (?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $email, $destination, $date, $discountpercentage);

                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>window.onload = function() {
                            document.getElementById('ratingOverlay').style.display = 'flex';
                          }</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error preparing the statement: " . mysqli_error($conn);
            }
        } else {
            // Handle case when promo code is empty
            echo "Please enter a promo code.";
        }
    } else {
        echo "Database connection not found in the session.";
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Book Your Trip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #14e459;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            height: 280px;
            width: 400px;
            text-align: center;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 9px;
            font-weight: bold;
            font-size: 14px;
        }

        button {
            margin-top: 25px;
            color: white;
            background-color: black;
            cursor: pointer;
        }

        #ratingOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        #ratingContainer {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .emoji-rating {
            font-size: 2em;
            display: horizontal;
            cursor: pointer;
        }
    </style>
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
