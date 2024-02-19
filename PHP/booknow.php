<?php
include "navbar.php";

include "SQL_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"];
    $date = $_POST["date"];
    $promoCode = $_POST["promoCode"];

    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

            // Use a default discount percentage if the promo code is not found
            $defaultDiscountPercentage = 0;

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
            $sql = "INSERT INTO booking (email, destination, date, promoCode) VALUES (?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $email, $destination, $date, $discountpercentage);

                if (mysqli_stmt_execute($stmt)) {
                    sleep(1);
                    echo "<script>window.onload = function() {
                            document.getElementById('ratingOverlay').style.display = 'flex';
                          }</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error preparing the statement: " . mysqli_error($conn);
            }
        } 
    }

?>